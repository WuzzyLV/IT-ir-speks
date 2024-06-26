@props([
    "class" => "",
])

<div class="{{ $class }} flex items-center justify-center" x-data="app()">
    <div class="mx-auto w-full rounded-xl bg-white p-2 text-black shadow">
        <div class="overflow-hidden rounded-md border border-gray-200">
            <div
                class="flex w-full border-b border-gray-200 !text-base text-gray-600"
            >
                <button
                    type="button"
                    class="h-10 w-10 border-r border-gray-200 outline-none hover:text-accent1 focus:outline-none active:bg-gray-50"
                    @click="format('bold')"
                >
                    <i class="fa-solid fa-bold"></i>
                </button>
                <button
                    type="button"
                    class="h-10 w-10 border-r border-gray-200 outline-none hover:text-accent1 focus:outline-none active:bg-gray-50"
                    @click="format('italic')"
                >
                    <i class="fa-solid fa-italic"></i>
                </button>
                <button
                    type="button"
                    class="h-10 w-10 border-r border-gray-200 outline-none hover:text-accent1 focus:outline-none active:bg-gray-50"
                    @click="format('underline')"
                >
                    <i class="fa-solid fa-underline"></i>
                </button>
                <button
                    type="button"
                    class="h-10 w-10 border-r border-gray-200 outline-none hover:text-accent1 focus:outline-none active:bg-gray-50"
                    @click="format('formatBlock','P')"
                >
                    <i class="fa-solid fa-p"></i>
                </button>
                <button
                    type="button"
                    class="h-10 w-10 border-r border-gray-200 outline-none hover:text-accent1 focus:outline-none active:bg-gray-50"
                    @click="format('formatBlock','H1')"
                >
                    <i class="fa-solid fa-h1"></i>
                </button>
                <button
                    type="button"
                    class="h-10 w-10 border-r border-gray-200 outline-none hover:text-accent1 focus:outline-none active:bg-gray-50"
                    @click="format('formatBlock','H2')"
                >
                    <i class="fa-solid fa-h2"></i>
                </button>
                <button
                    type="button"
                    class="h-10 w-10 border-r border-gray-200 outline-none hover:text-accent1 focus:outline-none active:bg-gray-50"
                    @click="format('formatBlock','H3')"
                >
                    <i class="fa-solid fa-h3"></i>
                </button>

                <button
                    type="button"
                    class="h-10 w-10 border-r border-gray-200 outline-none hover:text-accent1 focus:outline-none active:bg-gray-50"
                    @click="format('justifyLeft')"
                >
                    <i class="fa-solid fa-align-left"></i>
                </button>
                <button
                    type="button"
                    class="h-10 w-10 border-r border-gray-200 outline-none hover:text-accent1 focus:outline-none active:bg-gray-50"
                    @click="format('justifyCenter')"
                >
                    <i class="fa-solid fa-align-center"></i>
                </button>
                <button
                    type="button"
                    class="h-10 w-10 border-r border-gray-200 outline-none hover:text-accent1 focus:outline-none active:bg-gray-50"
                    @click="format('justifyRight')"
                >
                    <i class="fa-solid fa-align-right"></i>
                </button>
                <button
                    type="button"
                    class="h-10 w-10 border-l border-r border-gray-200 outline-none hover:text-accent1 focus:outline-none active:bg-gray-50"
                    @click="format('insertUnorderedList')"
                >
                    <i class="fa-solid fa-list"></i>
                </button>
                <button
                    type="button"
                    class="h-10 w-10 border-r border-gray-200 outline-none hover:text-accent1 focus:outline-none active:bg-gray-50"
                    @click="format('insertOrderedList')"
                >
                    <i class="fa-solid fa-list-ol"></i>
                </button>
            </div>
            <div class="w-full">
                <div
                    id="richEditor"
                    contenteditable="true"
                    x-ref="richEditor"
                    x-init="initComp($refs.richEditor, $refs.desc)"
                    class="h-96 w-full overflow-y-auto text-gray-900"
                    x-on:input="$refs.desc.value = $event.target.innerHTML"
                >
                    {!! $slot !!}
                </div>
            </div>
        </div>
    </div>
    <input
        type="text"
        id="content"
        x-ref="desc"
        hidden
        required
        name="content"
    />
</div>

<script>
    function app() {
        return {
            richEditor: null,
            input: null,
            initComp: function (editor, input) {
                if (editor === undefined) {
                    //trhow error
                    throw new Error('Element not found');
                    return;
                }
                this.richEditor = editor;
                this.input = input;

                this.input.value = this.richEditor.innerHTML;
            },
            format: function (cmd, param) {
                document.execCommand(cmd, false, param || null);
                this.input.value = this.richEditor.innerHTML;
            },
        };
    }
</script>
