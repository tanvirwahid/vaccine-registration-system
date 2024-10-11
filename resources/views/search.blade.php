<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center space-x-4">
                        <input type="text" name="nid" id="nid"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                               value="{{ $nid }}"
                               placeholder="Enter NID">

                        <x-primary-button type="button" class="search-btn">
                            {{ __('Search') }}
                        </x-primary-button>
                    </div>

                    <div class="mt-4 p-4 bg-white border border-gray-300 rounded-md shadow-sm grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <h2 class="text-lg font-medium text-gray-700" >Status</h2>
                            <p class="mt-1 text-sm text-gray-600" id="status-message">Search With Your NID To Know Status</p>
                            <a href="{{route('register')}}" id="registration-link">Click here to register</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <script>
        $(document).ready(function () {

            function getStatus()
            {
                var nid = $('#nid').val();

                if (nid) {
                    $.ajax({
                        url: '{{ route("status.show") }}',
                        type: 'GET',
                        data: { nid: nid },
                        success: function (response) {
                            $('#status-message').text(response.status);
                            if(response.status == 'Not Registered')
                            {
                                $('#registration-link').prop('hidden', false);
                            } else {
                                $('#registration-link').prop('hidden', true);
                            }
                        },
                        error: function (xhr) {
                            console.error(xhr.responseText);
                            $('#status-message').text('An error occurred while fetching the status.');
                        }
                    });
                } else {
                    $('#status-message').text('Please enter a valid NID.');
                }
            }

            $('.search-btn').on('click', function () {
                getStatus();
            });

            getStatus();
        });
    </script>
</x-app-layout>
