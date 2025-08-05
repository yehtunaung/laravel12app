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
                <div class="flex items-center justify-center w-8 h-8 bg-blue-600 text-white rounded-lg">
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
            <!-- Platform Section -->
            <div class="mb-6">
                <div class="mb-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider transition-all duration-300"
                    :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 px-3' : 'opacity-0 w-0 overflow-hidden'">
                    Platform
                </div>

                <ul class="space-y-1" x-data="{ openItems: ['Analytics'] }">

                    <!-- Dashboard -->
                    <li class="relative">
                        <a href="{{ route('admin.dashboard') }}" @mouseenter="hoveredItem = 'dashboard'"
                            @mouseleave="hoveredItem = null"
                            class="flex items-center py-2 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 border-r-2 border-blue-600' : '' }}"
                            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('admin.dashboard') ? 'text-blue-600 dark:text-blue-400' : '' }}"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            <span class="transition-all duration-300"
                                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
                                Dashboard
                            </span>
                        </a>

                        <!-- Tooltip -->
                        <div x-show="!sidebarOpen && !hoveredWhenClosed && hoveredItem === 'dashboard'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-x-2"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform translate-x-2"
                            class="absolute left-16 top-0 z-50 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 whitespace-nowrap">
                            Dashboard
                            <div class="absolute top-2 -left-1 w-2 h-2 bg-gray-900 dark:bg-gray-700 rotate-45"></div>
                        </div>
                    </li>

                    <!-- Analytics -->
                    <li x-data="{ open: openItems.includes('Analytics') }" class="relative">
                        <button
                            @click="open = !open; open ? openItems.push('Analytics') : openItems.splice(openItems.indexOf('Analytics'), 1)"
                            @mouseenter="hoveredItem = 'analytics'" @mouseleave="hoveredItem = null"
                            class="flex items-center w-full py-2 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200"
                            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                                </path>
                            </svg>
                            <span class="transition-all duration-300"
                                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
                                Analytics
                            </span>
                            <span
                                class="ml-auto px-2 py-1 text-xs font-medium text-gray-600 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300 transition-all duration-300"
                                x-show="sidebarOpen || hoveredWhenClosed">
                                New
                            </span>
                            <svg class="w-4 h-4 ml-2 transition-transform duration-200" :class="open ? 'rotate-90' : ''"
                                x-show="sidebarOpen || hoveredWhenClosed" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <!-- Tooltip -->
                        <div x-show="!sidebarOpen && !hoveredWhenClosed && hoveredItem === 'analytics'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-x-2"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform translate-x-2"
                            class="absolute left-16 top-0 z-50 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 whitespace-nowrap">
                            <div class="flex items-center">
                                Analytics
                                <span class="ml-2 px-1.5 py-0.5 text-xs bg-blue-500 text-white rounded">New</span>
                            </div>
                            <div class="absolute top-2 -left-1 w-2 h-2 bg-gray-900 dark:bg-gray-700 rotate-45"></div>
                        </div>

                        <!-- Submenu -->
                        <ul x-show="open && (sidebarOpen || hoveredWhenClosed)"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="ml-6 mt-1 space-y-1 border-l border-gray-200 dark:border-gray-700 pl-4">
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Overview</a>
                            </li>
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Reports</a>
                            </li>
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Traffic</a>
                            </li>
                        </ul>
                    </li>

                    <!-- E-commerce -->
                    <li x-data="{ open: false }" class="relative">
                        <button @click="open = !open" @mouseenter="hoveredItem = 'ecommerce'"
                            @mouseleave="hoveredItem = null"
                            class="flex items-center w-full py-2 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200"
                            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 2L3 7v11a1 1 0 001 1h12a1 1 0 001-1V7l-7-5zM9 18v-6h2v6H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="transition-all duration-300"
                                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
                                E-commerce
                            </span>
                            <svg class="w-4 h-4 ml-auto transition-transform duration-200"
                                :class="open ? 'rotate-90' : ''" x-show="sidebarOpen || hoveredWhenClosed"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <!-- Tooltip -->
                        <div x-show="!sidebarOpen && !hoveredWhenClosed && hoveredItem === 'ecommerce'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-x-2"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform translate-x-2"
                            class="absolute left-16 top-0 z-50 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 whitespace-nowrap">
                            E-commerce
                            <div class="absolute top-2 -left-1 w-2 h-2 bg-gray-900 dark:bg-gray-700 rotate-45"></div>
                        </div>

                        <!-- Submenu -->
                        <ul x-show="open && (sidebarOpen || hoveredWhenClosed)"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="ml-6 mt-1 space-y-1 border-l border-gray-200 dark:border-gray-700 pl-4">
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Products</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-between px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                    <span>Orders</span>
                                    <span
                                        class="px-2 py-1 text-xs font-medium text-blue-600 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">12</span>
                                </a>
                            </li>
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Customers</a>
                            </li>
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Inventory</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Users -->
                    <li x-data="{ open: false }" class="relative">
                        <button @click="open = !open" @mouseenter="hoveredItem = 'users'"
                            @mouseleave="hoveredItem = null"
                            class="flex items-center w-full py-2 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200"
                            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="transition-all duration-300"
                                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
                                Users
                            </span>
                            <svg class="w-4 h-4 ml-auto transition-transform duration-200"
                                :class="open ? 'rotate-90' : ''" x-show="sidebarOpen || hoveredWhenClosed"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <!-- Tooltip -->
                        <div x-show="!sidebarOpen && !hoveredWhenClosed && hoveredItem === 'users'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-x-2"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform translate-x-2"
                            class="absolute left-16 top-0 z-50 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 whitespace-nowrap">
                            Users
                            <div class="absolute top-2 -left-1 w-2 h-2 bg-gray-900 dark:bg-gray-700 rotate-45"></div>
                        </div>

                        <!-- Submenu -->
                        <ul x-show="open && (sidebarOpen || hoveredWhenClosed)"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="ml-6 mt-1 space-y-1 border-l border-gray-200 dark:border-gray-700 pl-4">
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">All
                                    Users</a></li>
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Roles</a>
                            </li>
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Permissions</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Content -->
                    <li x-data="{ open: false }" class="relative">
                        <button @click="open = !open" @mouseenter="hoveredItem = 'content'"
                            @mouseleave="hoveredItem = null"
                            class="flex items-center w-full py-2 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200"
                            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="transition-all duration-300"
                                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
                                Content
                            </span>
                            <svg class="w-4 h-4 ml-auto transition-transform duration-200"
                                :class="open ? 'rotate-90' : ''" x-show="sidebarOpen || hoveredWhenClosed"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <!-- Tooltip -->
                        <div x-show="!sidebarOpen && !hoveredWhenClosed && hoveredItem === 'content'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-x-2"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform translate-x-2"
                            class="absolute left-16 top-0 z-50 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 whitespace-nowrap">
                            Content
                            <div class="absolute top-2 -left-1 w-2 h-2 bg-gray-900 dark:bg-gray-700 rotate-45"></div>
                        </div>

                        <!-- Submenu -->
                        <ul x-show="open && (sidebarOpen || hoveredWhenClosed)"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="ml-6 mt-1 space-y-1 border-l border-gray-200 dark:border-gray-700 pl-4">
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Posts</a>
                            </li>
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Pages</a>
                            </li>
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Media</a>
                            </li>
                        </ul>
                    </li>

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

                        <!-- Tooltip -->
                        <div x-show="!sidebarOpen && !hoveredWhenClosed && hoveredItem === 'messages'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-x-2"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform translate-x-2"
                            class="absolute left-16 top-0 z-50 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 whitespace-nowrap">
                            <div class="flex items-center">
                                Messages
                                <span class="ml-2 px-1.5 py-0.5 text-xs bg-red-500 text-white rounded-full">5</span>
                            </div>
                            <div class="absolute top-2 -left-1 w-2 h-2 bg-gray-900 dark:bg-gray-700 rotate-45"></div>
                        </div>
                    </li>

                    <!-- Calendar -->
                    <li class="relative">
                        <a href="#" @mouseenter="hoveredItem = 'calendar'" @mouseleave="hoveredItem = null"
                            class="flex items-center py-2 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200"
                            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="transition-all duration-300"
                                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
                                Calendar
                            </span>
                        </a>

                        <!-- Tooltip -->
                        <div x-show="!sidebarOpen && !hoveredWhenClosed && hoveredItem === 'calendar'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-x-2"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform translate-x-2"
                            class="absolute left-16 top-0 z-50 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 whitespace-nowrap">
                            Calendar
                            <div class="absolute top-2 -left-1 w-2 h-2 bg-gray-900 dark:bg-gray-700 rotate-45"></div>
                        </div>
                    </li>

                    <!-- Finance -->
                    <li x-data="{ open: false }" class="relative">
                        <button @click="open = !open" @mouseenter="hoveredItem = 'finance'"
                            @mouseleave="hoveredItem = null"
                            class="flex items-center w-full py-2 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200"
                            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                                <path fill-rule="evenodd"
                                    d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="transition-all duration-300"
                                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
                                Finance
                            </span>
                            <svg class="w-4 h-4 ml-auto transition-transform duration-200"
                                :class="open ? 'rotate-90' : ''" x-show="sidebarOpen || hoveredWhenClosed"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <!-- Tooltip -->
                        <div x-show="!sidebarOpen && !hoveredWhenClosed && hoveredItem === 'finance'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-x-2"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform translate-x-2"
                            class="absolute left-16 top-0 z-50 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 whitespace-nowrap">
                            Finance
                            <div class="absolute top-2 -left-1 w-2 h-2 bg-gray-900 dark:bg-gray-700 rotate-45"></div>
                        </div>

                        <!-- Submenu -->
                        <ul x-show="open && (sidebarOpen || hoveredWhenClosed)"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="ml-6 mt-1 space-y-1 border-l border-gray-200 dark:border-gray-700 pl-4">
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Transactions</a>
                            </li>
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Invoices</a>
                            </li>
                            <li><a href="#"
                                    class="block px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Billing</a>
                            </li>
                        </ul>
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

                    <!-- Database -->
                    <li class="relative">
                        <a href="#" @mouseenter="hoveredItem = 'database'" @mouseleave="hoveredItem = null"
                            class="flex items-center py-2 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200"
                            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z">
                                </path>
                            </svg>
                            <span class="transition-all duration-300"
                                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
                                Database
                            </span>
                        </a>

                        <!-- Tooltip -->
                        <div x-show="!sidebarOpen && !hoveredWhenClosed && hoveredItem === 'database'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-x-2"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform translate-x-2"
                            class="absolute left-16 top-0 z-50 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 whitespace-nowrap">
                            Database
                            <div class="absolute top-2 -left-1 w-2 h-2 bg-gray-900 dark:bg-gray-700 rotate-45"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar Footer -->
        {{-- <div class="p-4 border-t border-gray-200 dark:border-gray-700">
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
        </div> --}}

        <!-- Sidebar Rail -->
        <div
            class="absolute inset-y-0 right-0 w-1 bg-transparent hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 cursor-col-resize">
        </div>
    </div>
</aside>
