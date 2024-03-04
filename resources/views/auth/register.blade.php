<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <div class="container mt-5">
            <p class="mb-3 ml-2">Dane Firmy</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf

        
            <!-- nazwa firmy -->
        <div>
                <x-label for="companyName" :value="__('Nazwa firmy')" />

                <x-input id="companyName" class="block mt-1 w-full" type="text" name="companyName" :value="old('companyName')" required autofocus />
        </div>

            <!-- Imie i nzawisko -->
        <div>
                <x-label for="fullName" :value="__('Imie i nazwisko')" />

                <x-input id="fullName" class="block mt-1 w-full" type="text" name="fullName" :value="old('fullName')" required  />
        </div>

            <!--Email -->
        <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required  />
        </div>

            <!-- NIP -->
        <div>
                <x-label for="nip" :value="__('NIP')" />

                <x-input id="nip" class="block mt-1 w-full" type="text" name="nip" :value="old('nip')" required  />
        </div>

            <!-- st line address -->
        <div>
                <x-label for="address1" :value="__('Adres i numer')" />

                <x-input id="address1" class="block mt-1 w-full" type="text" name="address1" :value="old('address1')" required  />
        </div>

            <!-- secound line of address -->
        <div>
                <x-label for="address2" :value="__('dróga linia adresu (opcjonalne)')" />

                <x-input id="address2" class="block mt-1 w-full" type="text" name="address2" :value="old('address2')" />
        </div>

            <!-- Post Code -->
        <div>
                <x-label for="postCode" :value="__('Kod pocztowy')" />

                <x-input id="postCode" class="block mt-1 w-full" type="text" name="postCode" :value="old('postCode')" required  />
        </div>

            <!-- miasto -->
        <div>
                <x-label for="city" :value="__('Miasto')" />

                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required  />
        </div>

            <!-- Panstwo -->
        <div>
                <x-label for="country" :value="__('Panstwo')" />

                <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required  />
        </div>

<p class="my-3 ml-2">Dane Konta</p>
            <!-- Login -->
        <div>
                <x-label for="name" :value="__('Login')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required  />
        </div>
            <!-- Haslo -->
        <div>
                <x-label for="password" :value="__('Hasło')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required  />
        </div>
        
            <!-- re Haslo -->
        <div>
                <x-label for="password_confirmation" :value="__('Powtóż Hasło')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" :value="old('password_confirmation')" required  />
        </div>

            <!-- regulamin 1 -->
        <div>
                <x-label for="terms1" :value="__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non rem placeat dolores reprehenderit asperiores quaerat, nostrum molestiae architecto molestias, modi libero. Voluptates unde nulla maiores mollitia quod similique, laboriosam natus.')" />

                <x-input id="terms1" class="block mt-1 w-full" type="checkbox" name="terms1" :value="old('terms1')" required  />
        </div>


            <!-- regulamin2 -->
        <div>
                <x-label for="terms2" :value="__('Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ab aut aspernatur cumque animi. Animi dolorum dicta sunt fugiat. Adipisci aut aliquam qui recusandae maiores aliquid corrupti voluptatibus asperiores! Quaerat?
            Exercitationem expedita repudiandae fugiat laboriosam necessitatibus dolor blanditiis rem rerum, atque dolorum odio tempore aspernatur recusandae quisquam nihil neque saepe quaerat voluptate minus similique nisi ipsam ratione officia. Consequatur, repudiandae.')" />

                <x-input id="terms2" class="block mt-1 w-full" type="checkbox" name="terms2" :value="old('terms2')" required  />
        </div>

        <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
    </form>
</div>




    </x-auth-card>
</x-guest-layout>
