@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false , 3000)" x-show="show" class="fixed top-0 left-1/2 transform bg-red-400 text-white px-40 py-3 -translate-x-1/2">
        <p >
            {{ session('message') }}
        </p>
    </div>
@endif
