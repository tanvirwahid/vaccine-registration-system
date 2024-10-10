<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="#" id="info-finder-form">
                        @csrf

                        <input type="text" hidden name="uuid" value="{{ $uuid }}">

                        <div class="mb-4">
                            <label for="nid" class="block text-sm font-medium text-gray-700">NID</label>
                            <input type="text" name="nid" id="nid"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   value="{{ old('nid') }}"
                                   placeholder="your nid">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="button" class="get-info-btn">
                                {{ __('Get Info') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <form method="POST" action="{{route('users.store')}}" >

                        @csrf

                        <input type="text" name="nid" id="nid_for_registration" hidden>

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1 block w-full relative">

                                <input type="text" name="name" id="name"
                                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm pr-12"
                                       readonly required>
                                @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>

                        <div class="mb-4">

                            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of
                                Birth</label>
                            <input type="date" name="date_of_birth" id="date_of_birth"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   value="{{ old('expiration') }}"
                                   readonly
                                   required
                            >
                            @error('date_of_birth')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   value="{{ old('email') }}"
                                   required
                            >
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="vaccine_center_id" class="block text-sm font-medium text-gray-700">Vaccine
                                Center</label>
                            <select name="vaccine_center_id" id="vaccine_center_id"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required
                            >
                                <option value="">Select a vaccine center</option>
                                @foreach($vaccineCenters as $center)
                                <option value="{{ $center->id }}" {{ old(
                                'vaccine_center_id') == $center->id ? 'selected' : '' }}>
                                {{ $center->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('vaccine_center_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button id="regiter-button">
                                    {{ __('Register') }}
                                </x-primary-button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.1/echo.iife.min.js"></script>
    <script>


        $(document).ready(function () {
            $('.get-info-btn').click(function (event) {
                event.preventDefault();

                let form = $('#info-finder-form');
                let url = '/find-user';

                $(this).prop('disabled', true);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form.serialize(),
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (xhr) {
                        var err = eval("(" + xhr.responseText + ")");
                        // console.log(xhr, err);
                        alert(err.message);

                        $('.get-info-btn').prop('disabled', false);
                    }
                })
            })

            window.Pusher = Pusher;
            Pusher.logToConsole = true;

            let uuid = '{{$uuid}}';

            const echo = new Echo({
                broadcaster: 'pusher',
                key: '{{ env("PUSHER_APP_KEY") }}',
                cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
                encrypted: true
            });

            console.log(echo);

            echo.channel('user-data-fetched.' + uuid )
                .listen('.UserDataFetched', (e) => {
                    if(!e.userExists) {
                        alert("Wrong NID");
                    } else {
                        $('#name').val(e.name);
                        $('#date_of_birth').val(e.dateOfBirth);
                        $('#nid_for_registration').val($('#nid').val());
                    }

                    $('.get-info-btn').prop('disabled', false);
                });
        });

    </script>

</x-app-layout>
