<div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
</div>

@if (!isset($user))
<div class="mb-3">
    <label>Contraseña</label>
    <input type="password" name="password" class="form-control" required>
</div>
@endif

<div class="mb-3">
    <label>Rol</label>
    <select name="role" class="form-control" required>
        <option value="cliente" {{ old('role', $user->role ?? '') == 'cliente' ? 'selected' : '' }}>Cliente</option>
        <option value="empleado" {{ old('role', $user->role ?? '') == 'empleado' ? 'selected' : '' }}>Empleado</option>
        <option value="administrador" {{ old('role', $user->role ?? '') == 'administrador' ? 'selected' : '' }}>Administrador</option>
    </select>
</div>

<div class="mb-3">
    <label>Dirección</label>
    <input type="text" name="address" class="form-control" value="{{ old('address', $user->client->address ?? '') }}">
</div>

<div class="mb-3">
    <label>Teléfono</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->client->phone ?? '') }}">
</div>
