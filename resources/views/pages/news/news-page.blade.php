<x-app-layout>
    <div
        class="relative isolate overflow-hidden bg-light1 px-6 py-8 sm:py-32 lg:overflow-visible lg:px-0"
    >
        <div
            class="mx-auto grid max-w-5xl grid-cols-1 gap-x-8 gap-y-8 lg:mx-0 lg:items-start"
        >
            <div class="lg:mx-auto lg:w-full lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <x-breadcrumbs currentRoute="{{ $news->title }}" />
                    <div class="">
                        <p
                            class="text-base font-semibold leading-7 text-accent1"
                        >
                            <time
                                datetime="{{ $news->created_at->format("Y-m-j") }}"
                            >
                                {{ BladeUtils::formatDate($news->created_at) }}
                            </time>
                        </p>
                        <h1
                            class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
                        >
                            {{ $news->title }}
                        </h1>
                        <p class="mt-4 text-xl leading-8 text-gray-700">
                            {{ $news->desc }}
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="m-0 flex justify-center px-4 lg:mx-8 lg:overflow-hidden lg:px-12"
            >
                <img
                    class="w-full max-w-5xl rounded-xl bg-gray-900 object-cover shadow-xl ring-1 ring-gray-400/10"
                    @if ($news->file()->exists())
                        src="{{ asset("storage/" . $news->file->file_path) }}"
                    @else
                        src="https://cc-prod.scene7.com/is/image/CCProdAuthor/What-is-Stock-Photography_P1_mobile?$pjpegBHT44BQk2cSSfHQbRyWTiLt4aUXYC60RD7MYdVkLpIpH9PbiaICgnGZII5lvfCRG6L3jtNpUSBrTCYiqLkTnKJ7zOin86wQih4EdTbFfTp1JqYlrLA9Sy5LwRu35JdolBjpegSize=200&wid=720"
                    @endif
                    alt=""
                />
            </div>
            <div class="mt-6 lg:mx-auto lg:w-full lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div
                        id="richEditor"
                        class="text-base leading-7 text-gray-700"
                    >
                        {!! $news->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
