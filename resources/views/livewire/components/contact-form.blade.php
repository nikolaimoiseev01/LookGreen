<form wire:submit.prevent="submit" class="flex flex-col">
    <div class="flex flex-col gap-4 mb-20">
        <input required type="text" wire:model="name" placeholder="ИМЯ*">
        <input required type="text" wire:model="phone" placeholder="ТЕЛЕФОН*">
        <input required type="email" wire:model="email" placeholder="E-MAIL*">
        <input required type="text" wire:model="company" placeholder="ВАША КОМПАНИЯ*">
    </div>
    <div class="flex flex-col">
        @if(!$isSent)
            <button type="submit" class="font-black text-4xl w-full py-8 bg-pink-300 uppercase text-center rounded-3xl mb-4 transition hover:bg-green-300">
                Оставить заявку</button>
        @else
            <p class="font-black text-4xl w-full py-8 bg-pink-300 uppercase text-center rounded-3xl mb-4">Заявка отправлена!</p>
        @endif
        <div class="flex gap-8 font-light text-xl mx-auto uppercase">
            <a href="">политика конфиденциальности* </a>
            <a href="">оферта*</a>
        </div>
    </div>
</form>
