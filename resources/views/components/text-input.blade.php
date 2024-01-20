@props(['disabled' => false])
<!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
@switch($attributes->get('type'))
    @case('textarea')
        <div class="relative mb-3" data-te-input-wrapper-init>
        <textarea
          {{ $disabled ? 'disabled' : '' }}
          {!! $attributes->merge(['class'=>"peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"]) !!}}>{!!$attributes->get('value') ?? old($attributes->get('name')) ?? ''!!}</textarea>
                <label
                    for="{{$attributes->get('id')}}"
                    class="pointer-events-none absolute ltr:left-3 rtl:right-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] peer-focus:rtl:translate-x-[20%] peer-data-[te-input-state-active]:rtl:translate-x-[20%] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                >{{$attributes->get('label') ?? __(ucfirst($attributes->get('id')))}}</label
                >
        </div>
        @break
    @case('file')
        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
        <div class="mb-3">
            <label
                for="{{$attributes->get('id')}}"
                class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
            >{{$attributes->get('label') ?? __(ucfirst($attributes->get('id')))}}</label
            >
            <input
                {{$attributes->merge(['class'=>"relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"])}}
                value="{{old($attributes->get('name'))}}"
            />
        </div>
    @break
    @default
        <div class="relative mb-3" data-te-input-wrapper-init>
            <input
                {{ $disabled ? 'disabled' : '' }}
                {!! $attributes->merge(['class'=>"peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"]) !!}}
                value="{{old($attributes->get('name'))}}"
            />
            <label
                for="{{$attributes->get('id')}}"
                class="pointer-events-none absolute ltr:left-3 rtl:right-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] peer-focus:rtl:translate-x-[20%] peer-data-[te-input-state-active]:rtl:translate-x-[20%] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
            >{{$attributes->get('label') ?? __(ucfirst($attributes->get('id')))}}
            </label>
        </div>
@endswitch
<x-input-error :messages="$errors->get($attributes->get('id'))" class="mb-2" />
