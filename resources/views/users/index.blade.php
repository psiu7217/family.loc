<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}, <b>{{ $user->name  }}</b>
        </h2>
    </x-slot>



    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @method('PUT')
                        @csrf
                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name  }}" required autofocus />
                                @error('name')
                                    <div class="alert alert-danger">{{ __($message) }}</div>
                                @enderror
                            </div>
                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email  }}" disabled />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Update') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Family') }}@if ($user->family), <b>{{$user->family->name}}</b> @endif
                        </h2><br>

                        @if ($user->family)

                            <div class="accordion" id="accordionExample">

                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                {{__('Add a friend to the family')}}
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('family.addUser') }}">
                                            @method('POST')
                                            @csrf
                                            <!-- Name -->
                                                <div class="">
                                                    <div class="mt-4">
                                                        <x-label for="email" :value="__('Email')" />
                                                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" required />
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end mt-4">
                                                    <x-button class="ml-4">
                                                        {{ __('Add') }}
                                                    </x-button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                {{ __('Leave your family') }}
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="alert alert-danger" role="alert">{{ __('Attention!!!') }} <br>
                                                {{ __('The family in which there are no members left will be deleted automatically!!!') }}<br>
                                                {{ __('All information (receipts, categories, income) will be deleted!') }}</p>
                                            <x-button class="ml-4">
                                                {{ __('Leave your family') }}
                                            </x-button>
                                        </div>
                                    </div>
                                </div>

                            </div>






                        @else
                            <p>Oops(( <br>
                                You don't have a family yet. <br>
                                Create or ask your friend to accept you. To do this, just send him your email. <b>{{ $user->email  }}</b></p>
                            <br>


                            <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Create new family') }}
                            </h3>

                            <form method="POST" action="{{ route('family.store') }}">
                                @method('POST')
                                @csrf
                                <!-- Name -->
                                <div class="">
                                    <x-label for="name" :value="__('Title')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" required />
                                    @error('name')
                                    <div class="alert alert-danger">{{ __($message) }}</div>
                                    @enderror
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <x-button class="ml-4">
                                        {{ __('Create') }}
                                    </x-button>
                                </div>
                            </form>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </x-slot>


</x-app-layout>
