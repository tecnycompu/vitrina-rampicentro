<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\OrderDetails;

class PedidoController extends Controller
{
    public function index()
    {
        // Fetch pedidos for the authenticated user
        $pedidos = Pedido::where('usuario_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pedidos.index', compact('pedidos'));
    }

    public function show(Pedido $pedido)
    {
        // Ensure user can only view their own pedidos
        $this->authorize('view', $pedido);

        // Load order details with related productos
        $pedido->load('detalles.producto');

        return view('pedidos.show', compact('pedido'));
    }

    public function create()
    {
        // Get items from user's cart
        $carrito = Auth::user()->carrito;
        
        if (!$carrito || $carrito->items->isEmpty()) {
            return redirect()->route('carrito.index')
                ->with('error', 'Tu carrito está vacío');
        }

        return view('pedidos.create', compact('carrito'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'direccion_envio' => 'required|string',
            'metodo_pago' => 'required|string'
        ]);

        DB::beginTransaction();
        try {
            // Get user's cart
            $carrito = Auth::user()->carrito;

            // Create new pedido
            $pedido = Pedido::create([
                'usuario_id' => Auth::id(),
                'fecha' => now(),
                'total_price' => $carrito->total_price,
                'status' => false, // Pendiente
                'direccion_envio' => $validated['direccion_envio']
            ]);

            // Transfer cart items to order details
            foreach ($carrito->items as $item) {
                OrderDetails::create([
                    'pedido_id' => $pedido->id,
                    'producto_id' => $item->producto_id,
                    'cantidad' => $item->cantidad,
                    'precio' => $item->producto->precio
                ]);

                // Update product stock
                $producto = $item->producto;
                if (!$producto->esIntangible) {
                    $producto->decrement('stock', $item->cantidad);
                }
            }

            // Clear the cart
            $carrito->items()->delete();
            $carrito->total_price = 0;
            $carrito->save();

            DB::commit();

            return redirect()->route('pedidos.show', $pedido)
                ->with('success', 'Pedido creado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al crear el pedido: ' . $e->getMessage());
        }
    }

    public function updateStatus(Pedido $pedido, Request $request)
    {
        // Only admin can update status
        $this->authorize('updateStatus', $pedido);

        $validated = $request->validate([
            'status' => 'required|boolean'
        ]);

        $pedido->update(['status' => $validated['status']]);

        return back()->with('success', 'Estado del pedido actualizado');
    }
}