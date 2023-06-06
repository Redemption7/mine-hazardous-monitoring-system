<div wire:poll.3000ms>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-center text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4">Department</th>
                            <th scope="col" class="px-6 py-4">Login Time</th>
                            <th scope="col" class="px-6 py-4">Alcohol Condition</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sys_users ?? [] as $user)
                            @if($user->is_sobber == 1)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        {{ $user->name . " " . $user->surname }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$user->department}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$user->time}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->is_sobber != 1 ? 'Drunk' : 'Sober' }}</td>
                                </tr>
                            @else
                                <tr class="border-b border-danger-200 bg-danger-100 text-neutral-800">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        {{ $user->name . " " . $user->surname }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$user->department}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$user->time}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->is_sobber != 1 ? 'Drunk' : 'Sober' }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
