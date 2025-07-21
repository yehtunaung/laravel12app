<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p>{{ __("You're logged in!") }}</p>

                    {{-- ✅ Role Name Display --}}
                    @php
                        $role = auth()->user()->getRoleNames()->first(); // Get first role
                    @endphp

                    @if ($role)
                        <p class="mt-2">
                            You're logged in as:
                            <strong class="text-green-600">{{ ucfirst($role) }}</strong>
                        </p>
                    @endif

                    {{-- ✅ Admin Role --}}
                    @can(['admin-dashboard', 'admin-dashboard-edit', 'admin-dashboard-delete'])
                        <div class="mt-4 p-4 bg-blue-100 rounded">
                            <h3 class="text-lg font-bold mb-2">Admin Section</h3>

                            @can('admin-dashboard')
                                <p>- Access to Admin Dashboard</p>
                            @endcan

                            @can('admin-dashboard-edit')
                                <p>- Can Edit Dashboard</p>
                            @endcan

                            @can('admin-dashboard-delete')
                                <p>- Can Delete Items</p>
                            @endcan
                        </div>
                    @endcan

                    {{-- ✅ Super Admin Role --}}
                    @hasrole('Super Admin')
                        <div class="mt-4 p-4 bg-purple-100 rounded">
                            <h3 class="text-lg font-bold mb-2">Super Admin Section</h3>

                            @can('admin-dashboard')
                                <p>- View Dashboard (Super Admin)</p>
                            @endcan
                        </div>
                    @endhasrole

                    {{-- ✅ User Role --}}
                    @hasrole('User')
                        <div class="mt-4 p-4 bg-green-100 rounded">
                            <h3 class="text-lg font-bold mb-2">User Section</h3>

                            @can('user-dashboard')
                                <p>- View User Dashboard</p>
                            @else
                                <p class="text-red-500">- No access to user dashboard.</p>
                            @endcan
                        </div>
                    @endhasrole

                    {{-- ✅ No Role Warning --}}
                    @unless ($role)
                        <div class="mt-4 text-red-500">
                            You're logged in but no role has been assigned.
                        </div>
                    @endunless

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
