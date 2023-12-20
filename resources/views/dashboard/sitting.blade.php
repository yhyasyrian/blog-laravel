<!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
<div
    class="block w-full rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
    <form method="post" action="{{route('dashboard')}}">
        @csrf
        @method('PUT')
        <!--E-mail input-->
        @foreach(\App\Models\Sitting::data as $value)
            @switch($value)
                @case('description')
                <x-text-input type="textarea" :id="$value"
                              :aria-describedby="$value"
                              :placeholder="__('site.'.$value)"
                              :label="__('site.'.$value)"
                              :name="$value"
                              rows="4"
                              :value="\App\Models\Sitting::getSitting('description')"
                />
                @break
                @case('title')
                    <x-text-input type="text" :id="$value"
                                  :aria-describedby="$value"
                                  :placeholder="__('site.'.$value)"
                                  :label="__('site.'.$value)"
                                  :name="$value"
                                  :value="\App\Models\Sitting::getSitting($value)"
                    />
                    @break
                @default
                @case('description')
                    <x-text-input type="text" :id="$value"
                                  :aria-describedby="$value"
                                  :placeholder="__($value)"
                                  :label="__('site.user').' '.$value"
                                  :name="$value"
                                  :value="\App\Models\Sitting::getSitting($value)"
                    />
                    @break
            @endswitch
        @endforeach
        <!--Submit button-->
        <button
            type="submit"
            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
            data-te-ripple-init
            data-te-ripple-color="light">
            {{__('site.save')}}
        </button>
    </form>
</div>
