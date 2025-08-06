<aside
    class="fixed top-0 left-0 z-40 h-screen pt-14 transition-all duration-300 ease-in-out bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700"
    :class="sidebarOpen ? 'w-64 translate-x-0' : (hoveredWhenClosed ? 'w-64 translate-x-0' : 'w-16 translate-x-0')"
    id="sidebar" x-data="{ hoveredWhenClosed: false, hoveredItem: null }" @mouseenter="if (!sidebarOpen) hoveredWhenClosed = true"
    @mouseleave="if (!sidebarOpen) { hoveredWhenClosed = false; hoveredItem = null; }">

    <!-- Sidebar content -->
    <div class="flex flex-col h-full bg-white dark:bg-gray-800 relative">

        <!-- Sidebar Header -->
        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center" :class="sidebarOpen || hoveredWhenClosed ? 'space-x-3' : 'justify-center'">
                <div class="flex items-center justify-center w-8 h-8 bg-secondary-600 text-white rounded-lg">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                        </path>
                    </svg>
                </div>
                <div x-show="sidebarOpen || hoveredWhenClosed" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 w-0" x-transition:enter-end="opacity-100 w-auto"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 w-auto"
                    x-transition:leave-end="opacity-0 w-0" class="flex-1 overflow-hidden">
                    <div class="text-sm font-semibold text-gray-900 dark:text-white">Admin Panel</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400">Enterprise</div>
                </div>
            </div>
        </div>

        <!-- Sidebar Content -->
        <div class="flex-1 overflow-y-auto py-4 px-3">
            <div class="mb-6">
                <div class="mb-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider transition-all duration-300"
                    :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 px-3' : 'opacity-0 w-0 overflow-hidden'">
                    Platform
                </div>

                <!-- Dashboard -->
                <x-sidebar.item label='Dashboard' active="{{ request()->routeIs('admin.dashboard') }}"></x-sidebar.item>

                <x-sidebar.sidebar-group groupLabel="UserManagement" icon="fa-solid fa-users" :active="request()->routeIs('admin.user') ||
                    request()->routeIs('admin.user') ||
                    request()->routeIs('admin.role') ||
                    request()->routeIs('admin.permission')">
                    <x-sidebar.sub-sidebar label="Users"
                        active="{{ request()->routeIs('admin.user') }}"></x-sidebar.sub-sidebar>
                    <x-sidebar.sub-sidebar label="Permissions" active=""></x-sidebar.sub-sidebar>
                    <x-sidebar.sub-sidebar label="Roles" active=""></x-sidebar.sub-sidebar>
                </x-sidebar.sidebar-group>

                <ul>
                    <!-- Messages -->
                    <li class="relative">
                        <a href="#" @mouseenter="hoveredItem = 'messages'" @mouseleave="hoveredItem = null"
                            class="flex items-center py-2 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200"
                            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="transition-all duration-300"
                                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
                                Messages
                            </span>
                            <span
                                class="ml-auto px-2 py-1 text-xs font-medium text-white bg-red-500 rounded-full transition-all duration-300"
                                x-show="sidebarOpen || hoveredWhenClosed">
                                5
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Secondary Section -->
            <div class="mt-auto">
                <ul class="space-y-1">
                    <!-- Settings -->
                    <li class="relative">
                        <a href="#" @mouseenter="hoveredItem = 'settings'" @mouseleave="hoveredItem = null"
                            class="flex items-center py-2 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200"
                            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="transition-all duration-300"
                                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
                                Settings
                            </span>
                        </a>

                        <!-- Tooltip -->
                        <div x-show="!sidebarOpen && !hoveredWhenClosed && hoveredItem === 'settings'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-x-2"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform translate-x-2"
                            class="absolute left-16 top-0 z-50 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 whitespace-nowrap">
                            Settings
                            <div class="absolute top-2 -left-1 w-2 h-2 bg-gray-900 dark:bg-gray-700 rotate-45"></div>
                        </div>
                    </li>

                    <!-- Security -->
                    <li class="relative">
                        <a href="#" @mouseenter="hoveredItem = 'security'" @mouseleave="hoveredItem = null"
                            class="flex items-center py-2 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200"
                            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="transition-all duration-300"
                                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
                                Security
                            </span>
                        </a>

                        <!-- Tooltip -->
                        <div x-show="!sidebarOpen && !hoveredWhenClosed && hoveredItem === 'security'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-x-2"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform translate-x-2"
                            class="absolute left-16 top-0 z-50 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 whitespace-nowrap">
                            Security
                            <div class="absolute top-2 -left-1 w-2 h-2 bg-gray-900 dark:bg-gray-700 rotate-45"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center" :class="sidebarOpen || hoveredWhenClosed ? 'space-x-3' : 'justify-center'">
                <div class="w-8 h-8 bg-gray-300 rounded-lg flex items-center justify-center">
                    <span class="text-sm font-medium text-gray-700">AD</span>
                </div>
                <div x-show="sidebarOpen || hoveredWhenClosed" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 w-0" x-transition:enter-end="opacity-100 w-auto"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 w-auto"
                    x-transition:leave-end="opacity-0 w-0" class="flex-1 overflow-hidden">
                    <div class="text-sm font-semibold text-gray-900 dark:text-white">Admin User</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400">admin@company.com</div>
                </div>
            </div>
        </div>

        <!-- Sidebar Rail -->
        <div
            class="absolute inset-y-0 right-0 w-1 bg-transparent hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 cursor-col-resize">
        </div>
    </div>
</aside>
