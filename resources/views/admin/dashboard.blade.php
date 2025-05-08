@extends('admin.layouts.app')
@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="hidden lg:flex fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-blue-700 to-blue-900 text-white shadow-xl z-10">
        <div class="flex flex-col w-full">
            <div class="px-6 py-8 border-b border-blue-600">
                <h2 class="text-2xl font-bold tracking-tight">Sistema Escolar</h2>
                <p class="text-blue-200 text-sm mt-1">Panel de Administración</p>
            </div>

            <div class="px-6 py-4 border-b border-blue-600 flex items-center">
                <div class="w-10 h-10 rounded-full bg-blue-200 flex items-center justify-center text-blue-800 font-bold text-lg">
                    {{ substr(Auth::guard('admin')->user()->name, 0, 1) }}
                </div>
                <div class="ml-3">
                    <p class="font-medium">{{ Auth::guard('admin')->user()->name }}</p>
                    <p class="text-xs text-blue-200">Administrador</p>
                </div>
            </div>

            <nav class="mt-6 px-4 flex-grow">
                <div class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg bg-white bg-opacity-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.students.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Estudiantes
                    </a>
                    <a href="{{ route('admin.teachers.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Profesores
                    </a>
                    <a href="{{ route('admin.courses.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Cursos
                    </a>
                    <a href="{{ route('admin.admins.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Administradores
                    </a>
                    <a href="#" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Configuración
                    </a>
                </div>
            </nav>

            <div class="mt-auto px-6 py-4 border-t border-blue-600">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm font-medium bg-red-500 hover:bg-red-600 transition duration-150 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="lg:pl-64">
        <header class="lg:hidden bg-white shadow-md">
            <div class="flex items-center justify-between p-4">
                <button type="button" id="mobile-menu-button" class="p-2 rounded-md text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="text-center">
                    <h1 class="text-lg font-semibold text-gray-900">Sistema Escolar</h1>
                </div>
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-bold text-lg">
                    {{ substr(Auth::guard('admin')->user()->name, 0, 1) }}
                </div>
            </div>
        </header>

        <div id="mobile-menu" class="lg:hidden hidden fixed inset-0 z-20 bg-black bg-opacity-50">
            <div class="fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-blue-700 to-blue-900 text-white shadow-xl">
                <div class="flex flex-col h-full">
                    <div class="px-6 py-4 border-b border-blue-600 flex items-center justify-between">
                        <h2 class="text-xl font-bold">Sistema Escolar</h2>
                        <button id="close-mobile-menu" class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="px-6 py-4 border-b border-blue-600 flex items-center">
                        <div class="w-10 h-10 rounded-full bg-blue-200 flex items-center justify-center text-blue-800 font-bold text-lg">
                            {{ substr(Auth::guard('admin')->user()->name, 0, 1) }}
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">{{ Auth::guard('admin')->user()->name }}</p>
                            <p class="text-xs text-blue-200">Administrador</p>
                        </div>
                    </div>

                    <nav class="mt-6 px-4 flex-grow">
                        <div class="space-y-1">
                            <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg bg-white bg-opacity-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 00 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </a>
                            <a href="{{ route('admin.students.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Estudiantes
                            </a>
                            <a href="{{ route('admin.teachers.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                Profesores
                            </a>
                            <a href="{{ route('admin.courses.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                Cursos
                            </a>
                            <a href="{{ route('admin.admins.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Administradores
                            </a>
                            <a href="#" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Configuración
                            </a>
                        </div>
                    </nav>

                    <div class="mt-auto px-6 py-4 border-t border-blue-600">
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center w-full px-4 py-2 text-sm font-medium bg-red-500 hover:bg-red-600 transition duration-150 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <main class="p-4 md:p-6 lg:p-8">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-xl p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="mb-4 md:mb-0">
                        <h1 class="text-3xl md:text-4xl font-bold text-white">
                            ¡Bienvenido, {{ Auth::guard('admin')->user()->name }}!
                        </h1>
                        <p class="text-blue-100 mt-2">
                            <span id="greeting">Buenos días</span> • <span id="current-date">Miércoles, 7 de Mayo 2025</span>
                        </p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="bg-white bg-opacity-20 hover:bg-opacity-30 transition-all duration-150 px-4 py-2 rounded-lg text-white text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            Notificaciones
                        </button>
                        <button class="bg-white bg-opacity-20 hover:bg-opacity-30 transition-all duration-150 px-4 py-2 rounded-lg text-white text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Calendario
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Estudiantes</p>
                                <h2 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalStudents ?? 0 }}</h2>
                                <p class="text-green-500 text-sm font-medium mt-1">
                                    <span class="inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                        </svg>
                                    </span>
                                    +2% este mes
                                </p>
                            </div>
                            <div class="bg-green-500 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-50 px-5 py-3">
                        <a href="{{ route('admin.students.index') }}" class="text-green-600 hover:text-green-800 text-sm font-medium flex items-center">
                            Ver detalles
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Cursos</p>
                                <h2 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalCourses ?? 0 }}</h2>
                                <p class="text-yellow-500 text-sm font-medium mt-1">
                                    <span class="inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m-8 0l-4 4m4-4l4 4M21 12H3" />
                                        </svg>
                                    </span>
                                    Sin cambios
                                </p>
                            </div>
                            <div class="bg-yellow-500 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-yellow-50 px-5 py-3">
                        <a href="#" class="text-yellow-600 hover:text-yellow-800 text-sm font-medium flex items-center">
                            Ver detalles
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Profesores</p>
                                <h2 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalTeachers ?? 0 }}</h2>
                                <p class="text-red-500 text-sm font-medium mt-1">
                                    <span class="inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                        </svg>
                                    </span>
                                    -1% este mes
                                </p>
                            </div>
                            <div class="bg-red-500 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-red-50 px-5 py-3">
                        <a href="{{ route('admin.teachers.index') }}" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center">
                            Ver detalles
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Administradores</p>
                                <h2 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalAdmins ?? 0 }}</h2>
                                <p class="text-blue-500 text-sm font-medium mt-1">
                                    <span class="inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    +5% este mes
                                </p>
                            </div>
                            <div class="bg-blue-500 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-50 px-5 py-3">
                        <a href="{{ route('admin.admins.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                            Ver detalles
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Últimos Estudiantes Registrados</h3>
                        <ul class="divide-y divide-gray-200">
                            <li class="py-3">
                                <div class="flex items-center justify-between">
                                </div>
                            </li>
                            <li class="py-3 text-gray-500">No hay estudiantes registrados recientemente.</li>
                        </ul>
                        <div class="bg-gray-50 px-6 py-3">
                            <a href="{{ route('admin.students.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                Ver todos los estudiantes
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>

                        <div class="text-center mb-6">
                            <a href="{{ route('admin.subjects.index') }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Gestionar Asignaturas</a>
                        </div>

                        <div class="text-center mb-6">
                            <a href="{{ route('admin.groups.index') }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Gestionar Grupos</a>
                        </div>

                        <div class="text-center mb-6">
                            <a href="{{ route('admin.grades.index') }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Gestionar Calificaciones</a>
                        </div>

                        <div class="text-center mb-6">
                            <a href="{{ route('admin.schedules.index') }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Gestionar Horarios</a>
                        </div>

                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Próximos Eventos</h3>
                        <ul class="divide-y divide-gray-200">
                            <li class="py-3">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-700 font-medium">Reunión de Padres</p>
                                        <p class="text-sm text-gray-500">15 de Mayo, 2025 - 10:00 AM</p>
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Próximo
                                    </span>
                                </div>
                            </li>
                            <li class="py-3">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-700 font-medium">Exámenes Finales</p>
                                        <p class="text-sm text-gray-500">22 - 26 de Mayo, 2025</p>
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Importante
                                    </span>
                                </div>
                            </li>
                            <li class="py-3">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-700 font-medium">Día del Estudiante</p>
                                        <p class="text-sm text-gray-500">5 de Junio, 2025</p>
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Evento
                                    </span>
                                </div>
                            </li>
                        </ul>
                        <div class="bg-gray-50 px-6 py-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                Ver calendario completo
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMobileMenu = document.getElementById('close-mobile-menu');

        if (mobileMenuButton && mobileMenu && closeMobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.remove('hidden');
            });

            closeMobileMenu.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        }

        function updateDateTime() {
            const greetingElement = document.getElementById('greeting');
            const currentDateElement = document.getElementById('current-date');
            const now = new Date();
            const hours = now.getHours();
            const dayOfWeek = new Intl.DateTimeFormat('es-MX', { weekday: 'long' }).format(now);
            const day = now.getDate();
            const month = new Intl.DateTimeFormat('es-MX', { month: 'long' }).format(now);
            const year = now.getFullYear();

            let greeting = 'Buenos días';
            if (hours >= 12 && hours < 18) {
                greeting = 'Buenas tardes';
            } else if (hours >= 18) {
                greeting = 'Buenas noches';
            }

            if (greetingElement) {
                greetingElement.textContent = greeting;
            }
            if (currentDateElement) {
                currentDateElement.textContent = `${dayOfWeek.charAt(0).toUpperCase() + dayOfWeek.slice(1)}, ${day} de ${month.charAt(0).toUpperCase() + month.slice(1)} ${year}`;
            }
        }

        updateDateTime();
        setInterval(updateDateTime, 60000); // Update every minute
    });
</script>
@endsection