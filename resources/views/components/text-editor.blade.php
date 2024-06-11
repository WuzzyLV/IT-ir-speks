@props(["class" => ""])

<style>
    @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);

    .active\:bg-gray-50:active {
        --tw-bg-opacity: 1;
        background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
    }

</style>

<div class="{{ $class }} flex items-center justify-center">
    <div class="mx-auto w-full rounded-xl bg-white p-2 text-black shadow" x-data="app()" x-init="init($refs.richEditor)">
        <div class="overflow-hidden rounded-md border border-gray-200">
            <div class="flex w-full border-b border-gray-200 text-xl text-gray-600">
                
                <button type='button' class="h-10 w-10 border-l border-r border-gray-200 outline-none hover:text-indigo-500 focus:outline-none active:bg-gray-50" @click="format('formatBlock','P')">
                    <i class="mdi mdi-format-paragraph"></i>
                </button>
                <button type='button' class="h-10 w-10 border-r border-gray-200 outline-none hover:text-indigo-500 focus:outline-none active:bg-gray-50" @click="format('formatBlock','H1')">
                    <i class="mdi mdi-format-header-1"></i>
                </button>
                <button type='button' class="h-10 w-10 border-r border-gray-200 outline-none hover:text-indigo-500 focus:outline-none active:bg-gray-50" @click="format('formatBlock','H2')">
                    <i class="mdi mdi-format-header-2"></i>
                </button>
                <button type='button' class="mr-1 h-10 w-10 border-r border-gray-200 outline-none hover:text-indigo-500 focus:outline-none active:bg-gray-50" @click="format('formatBlock','H3')">
                    <i class="mdi mdi-format-header-3"></i>
                </button>
                
                <button type='button' class="h-10 w-10 border-l border-r border-gray-200 outline-none hover:text-indigo-500 focus:outline-none active:bg-gray-50" @click="format('justifyLeft')">
                    <i class="mdi mdi-format-align-left"></i>
                </button>
                <button type='button' class="h-10 w-10 border-r border-gray-200 outline-none hover:text-indigo-500 focus:outline-none active:bg-gray-50" @click="format('justifyCenter')">
                    <i class="mdi mdi-format-align-center"></i>
                </button>
                <button type='button' class="h-10 w-10 border-r border-gray-200 outline-none hover:text-indigo-500 focus:outline-none active:bg-gray-50" @click="format('justifyRight')">
                    <i class="mdi mdi-format-align-right"></i>
                </button>
            </div>
            <div class="w-full">
                <iframe x-ref="richEditor" class="h-96 w-full overflow-y-auto"></iframe>
            </div>
        </div>
    </div>
</div>

<script>
    function app() {
        return {
            richEditor: null
            , init: function(el) {
                // Get el
                this.richEditor = el;
                // Add CSS
                this.richEditor.contentDocument.querySelector(
                    'head'
                , ).innerHTML += `<style>
            *, ::after, ::before {box-sizing: border-box;}
            :root {tab-size: 4;}
            html {line-height: 1.15;text-size-adjust: 100%;}
            body {margin: 0px; padding: 1rem 0.5rem;}
            body {font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";}
            </style>`;
                this.richEditor.contentDocument.body.innerHTML += `
            
            `;
                // Make editable
                this.richEditor.contentDocument.designMode = 'on';
            }
            , format: function(cmd, param) {
                console.log(cmd, param);
                this.richEditor.contentDocument.execCommand(
                    cmd
                    , !1
                    , param || null
                , );
            }
        , };
    }

</script>
