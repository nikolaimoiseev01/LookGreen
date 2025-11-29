<form wire:submit.prevent="submit" class="flex flex-col">
    <div class="flex flex-col gap-4 mb-20">
        <input type="text" placeholder="ИМЯ*">
        <input type="text" placeholder="ТЕЛЕФОН*">
        <input type="email" placeholder="E-MAIL*">
        <input type="text" placeholder="ВАША КОМПАНИЯ*">
    </div>
    <div class="flex flex-col">
        <a href="" class="font-black text-4xl w-full py-8 bg-pink-300 uppercase text-center rounded-3xl">Оставить заявку</a>
        <div class="flex gap-8 font-light text-xl mx-auto">
            <a href="">политика конфиденциальности* </a>
            <a href="">оферта*</a>
        </div>
    </div>
</form>
