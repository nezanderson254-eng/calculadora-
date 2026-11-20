<x-layout>
    <x-slot:title>Calculadora Laravel</x-slot:title>
    <h1>Calculadora</h1>
    <p>Operaciones básicas con PHP y Laravel.</p>

    @if (session('resultado') !== null)
        <div class="resultado">Resultado: {{ session('resultado') }}</div>
    @endif
    @if (session('mensaje'))
        <p>{{ session('mensaje') }}</p>
    @endif

    <form action="{{ route('calculadora.calcular') }}" method="POST">
        @csrf
        <label>Primer número</label>
        <input type="number" step="any" name="num1" value="{{ old('num1') }}" required>
        @error('num1') <small>{{ $message }}</small> @enderror

        <label>Segundo número</label>
        <input type="number" step="any" name="num2" value="{{ old('num2') }}" required>
        @error('num2') <small>{{ $message }}</small> @enderror

        <label>Operación</label>
        <select name="operacion" required>
            <option value="sumar">Sumar</option>
            <option value="restar">Restar</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
        </select>
        @error('operacion') <small>{{ $message }}</small> @enderror

        <button type="submit">Calcular</button>
    </form>

    <h2>Últimas operaciones</h2>
    @forelse ($historial as $item)
        <p>{{ $item->num1 }} {{ $item->operation }} {{ $item->num2 }} = {{ $item->result }}</p>
    @empty
        <p>Aún no hay operaciones guardadas.</p>
    @endforelse
</x-layout>
