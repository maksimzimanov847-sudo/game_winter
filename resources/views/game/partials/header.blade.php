<header class="bg-blue-500 shadow-md sticky top-8 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="#" class="flex items-center text-white text-2xl font-bold">
                    <span class="mr-2">Зиманушка</span>
                </a>
            </div>

            <nav class="flex items-center space-x-4">
                <a href="#" class="nav_link_item text-white hover:text-blue-300 px-3 py-2 rounded">Каталог</a>
                <a href="#" class="nav_link_item text-white hover:text-blue-300 px-3 py-2 rounded">Категория</a>
                <a href="#" class="nav_link_item text-white hover:text-blue-300 px-3 py-2 rounded">О нас</a>
                <a href="#" class="nav_link_item text-white hover:text-blue-300 px-3 py-2 rounded">Контакты</a>
                <a href="{{route("login")}}" class="bg-white text-blue-500 px-4 py-2 rounded shadow hover:bg-gray-100">Войти</a>
                <a href="{{route("register")}}" class="bg-white text-blue-500 px-4 py-2 rounded shadow hover:bg-gray-100">Регистрация</a>
            </nav>
        </div>
    </div>
</header>
