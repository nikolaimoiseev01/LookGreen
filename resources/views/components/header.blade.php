<header class="w-full bg-pink-500 absolute z-10">
    <div class="content flex justify-between items-center py-5">

        <div class="flex gap-10 items-center">
            <!-- Логотип -->
            <svg width="120" height="29" viewBox="0 0 120 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M119.977 0H0C0 15.793 13.6553 28.6131 30.5332 28.6131C44.3045 28.6131 55.9196 20.0664 59.7218 8.33776C59.8145 8.05906 60.1855 8.05906 60.2782 8.33776C64.0804 20.0664 75.6723 28.6364 89.4668 28.6364C106.345 28.6364 120 15.8394 120 0.0232255L119.977 0Z" fill="white"/>
                <path d="M53.1584 0C53.1584 9.41672 45.8282 17.0455 36.8065 17.0455C27.7847 17.0455 20.4546 9.41672 20.4546 0H53.1819H53.1584Z" fill="#2F2F2F"/>
                <path d="M111.795 0C111.795 9.41672 104.618 17.0455 95.7839 17.0455C86.9501 17.0455 79.7727 9.41672 79.7727 0H111.818H111.795Z" fill="#2F2F2F"/>
            </svg>

            <!-- Десктоп-меню -->
            <div class="lg:hidden flex text-2xl gap-8 ml-16">
                <a href="" class="transition hover:text-green-300">О нас</a>
                <a href="" class="transition hover:text-green-300">Покупателям</a>
                <a href="#footer" class="transition hover:text-green-300">Контакты</a>
            </div>
        </div>

        <!-- Иконки -->
        <div class="flex gap-5 lg:hidden">
            <img src="/fixed/logos/ozon.svg" alt="">
            <img src="/fixed/logos/wb.svg" alt="">
        </div>

        <!-- Мобильная кнопка -->
        <label for="menu-toggle" class="hidden lg:block cursor-pointer ml-4">
            <div class="w-8 h-1 bg-white mb-1"></div>
            <div class="w-8 h-1 bg-white mb-1"></div>
            <div class="w-8 h-1 bg-white"></div>
        </label>

        <!-- Чекбокс -->
        <input type="checkbox" id="menu-toggle" class="hidden peer">

        <!-- Мобильное меню -->
        <nav class="absolute top-full left-0 w-full bg-pink-500 flex-col items-start gap-4 px-6 py-5 text-xl
                    hidden peer-checked:flex lg:hidden shadow-md">
            <a href="" class="transition hover:text-green-300">О нас</a>
            <a href="" class="transition hover:text-green-300">Покупателям</a>
            <a href="#footer" class="transition hover:text-green-300">Контакты</a>
        </nav>

    </div>
</header>
