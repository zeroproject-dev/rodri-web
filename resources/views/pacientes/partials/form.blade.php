<form action="{{ $action_url }}" method="POST">
    @csrf
    @method($method)

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <x-input-label for="primer_nombre" :value="__('Primer nombre')" />
            <x-text-input id="primer_nombre" class="block mt-1 w-full" type="text" name="primer_nombre" :value="old('primer_nombre', $paciente->primer_nombre)"
                autofocus />
            <x-input-error :messages="$errors->get('primer_nombre')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="segundo_nombre" :value="__('Segundo nombre')" />
            <x-text-input id="segundo_nombre" class="block mt-1 w-full" type="text" name="segundo_nombre"
                :value="old('segundo_nombre', $paciente->segundo_nombre)" />
            <x-input-error :messages="$errors->get('segundo_nombre')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="paterno" :value="__('Apellido paterno')" />
            <x-text-input id="paterno" class="block mt-1 w-full" type="text" name="paterno" :value="old('paterno', $paciente->paterno)" />
            <x-input-error :messages="$errors->get('paterno')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="materno" :value="__('Apellido materno')" />
            <x-text-input id="materno" class="block mt-1 w-full" type="text" name="materno" :value="old('materno', $paciente->materno)" />
            <x-input-error :messages="$errors->get('materno')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="numero" :value="__('Teléfono')" />
            <x-text-input id="numero" class="block mt-1 w-full" type="text" name="numero" :value="old('numero', $paciente->numero)" />
            <x-input-error :messages="$errors->get('numero')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
            <x-date-picker id="fecha_nacimiento" class="block mt-1 w-full" type="text" name="fecha_nacimiento"
                :value="old(
                    'fecha_nacimiento',
                    $paciente->fecha_nacimiento ? $paciente->fecha_nacimiento->format('d/m/Y') : '',
                )" />
            <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
        </div>
    </div>
    <div class="mb-6">
        <x-input-label for="correo" :value="__('Correo')" />
        <x-text-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="old('correo', $paciente->correo)" />
        <x-input-error :messages="$errors->get('correo')" class="mt-2" />
    </div>

    <x-primary-button type="submit">
        {{ __($submit_button_text) }}
    </x-primary-button>
</form>
