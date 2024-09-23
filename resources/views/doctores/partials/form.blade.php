<form action="{{ $action_url }}" method="POST">
    @csrf
    @method($method)

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <x-input-label for="primer_nombre" :value="__('Primer nombre')" />
            <x-text-input id="primer_nombre" class="block mt-1 w-full" type="text" name="primer_nombre" :value="old('primer_nombre', $doctor->primer_nombre)"
                autofocus />
            <x-input-error :messages="$errors->get('primer_nombre')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="segundo_nombre" :value="__('Segundo nombre')" />
            <x-text-input id="segundo_nombre" class="block mt-1 w-full" type="text" name="segundo_nombre"
                :value="old('segundo_nombre', $doctor->segundo_nombre)" />
            <x-input-error :messages="$errors->get('segundo_nombre')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="paterno" :value="__('Apellido paterno')" />
            <x-text-input id="paterno" class="block mt-1 w-full" type="text" name="paterno" :value="old('paterno', $doctor->paterno)" />
            <x-input-error :messages="$errors->get('paterno')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="materno" :value="__('Apellido materno')" />
            <x-text-input id="materno" class="block mt-1 w-full" type="text" name="materno" :value="old('materno', $doctor->materno)" />
            <x-input-error :messages="$errors->get('materno')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="especialidad" :value="__('Especialidad')" />
            <x-text-input id="especialidad" class="block mt-1 w-full" type="text" name="especialidad"
                :value="old('especialidad', $doctor->especialidad)" />
            <x-input-error :messages="$errors->get('especialidad')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="genero" :value="__('Genero')" />
            <x-text-input id="genero" class="block mt-1 w-full" type="text" name="genero" :value="old('genero', $doctor->genero)" />
            <x-input-error :messages="$errors->get('genero')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="numero" :value="__('Teléfono')" />
            <x-text-input id="numero" class="block mt-1 w-full" type="text" name="numero" :value="old('numero', $doctor->numero)" />
            <x-input-error :messages="$errors->get('numero')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
            <x-date-picker id="fecha_nacimiento" class="block mt-1 w-full" type="text" name="fecha_nacimiento"
                :value="old(
                    'fecha_nacimiento',
                    $doctor->fecha_nacimiento ? $doctor->fecha_nacimiento->format('d/m/Y') : '',
                )" />
            <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $doctor->email)" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="user" :value="__('Usuario')" />
            <x-text-input id="user" class="block mt-1 w-full" type="text" name="user" :value="old('user', $doctor->user)" />
            <x-input-error :messages="$errors->get('user')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
    </div>
    <x-primary-button class="ms-4">
        {{ $submit_button_text }}
    </x-primary-button>
</form>
