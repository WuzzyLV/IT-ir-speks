<form
    class="hidden rounded-lg border !border-b-2 !border-gray-900/25 mx-0 sm:mx-6 p-6"
    id="apply-form"
>
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2
                class="text-center text-base font-semibold leading-7 text-gray-900"
            >
                Pieteikuma dati
            </h2>
            <p class="text-gray-60 mt-1 text-center text-sm leading-6">
                Aizpildi datus, kuri tiks nogadāti darbadevējam.
            </p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label
                        for="first-name"
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        Vārds
                    </label>
                    <div class="mt-2">
                        <input
                            type="text"
                            name="name"
                            id="name"
                            autocomplete="given-name"
                            placeholder="Kevins"
                            required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-within:ring-accent1 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                        />
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label
                        for="last-name"
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        Uzvārds
                    </label>
                    <div class="mt-2">
                        <input
                            type="text"
                            name="last-name"
                            id="last-name"
                            autocomplete="family-name"
                            placeholder="Kakiņš"
                            required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-within:ring-accent1 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                        />
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label
                        for="email"
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        E-pasta adrese
                    </label>
                    <div class="mt-2">
                        <input
                            id="email"
                            name="email"
                            type="email"
                            placeholder="kakins@inbox.lv"
                            autocomplete="email"
                            required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-within:ring-accent1 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                        />
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label
                        for="last-name"
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        Telefona numurs
                    </label>
                    <div class="mt-2">
                        <input
                            type="tel"
                            name="phone-number"
                            id="phone-number"
                            autocomplete="tel"
                            placeholder="25 851 572"
                            pattern="[0-9]*"
                            maxlength="8"
                            minlength="8"
                            required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-within:ring-accent1 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                        />
                    </div>
                </div>
            </div>
            <div class="col-span-full mt-6">
                <label
                    for="cover-photo"
                    class="block text-sm font-medium leading-6 text-gray-900"
                >
                    Tavs CV
                </label>
                <div
                    class="shdow mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 bg-white px-6 py-10 shadow"
                    id="drop-area"
                >
                    <div class="text-center">
                        <i class="fa-regular fa-file-lines text-4xl"></i>
                        <div
                            class="mt-4 flex justify-center text-sm leading-6 text-gray-600"
                        >
                            <label
                                for="file-upload"
                                class="relative flex cursor-pointer justify-center rounded-md font-semibold text-accent1 focus-within:outline-none focus-within:ring-2 focus-within:ring-accent1 focus-within:ring-offset-2 hover:text-dark1"
                            >
                                <span id="file-result">Augšupieladē failu</span>
                                <input
                                    id="file-upload"
                                    name="file-upload"
                                    type="file"
                                    class="sr-only"
                                />
                            </label>
                            <p class="pl-1" id="file-hide-if-upload">
                                vai velc un nomet šeit
                            </p>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">
                            PDF, DOC, DOCX līdz 10MB
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropArea = document.getElementById('drop-area');
            const fileInput = document.getElementById('file-upload');
            const fileResult = document.getElementById('file-result');
            const hideIfUpload = document.getElementById('file-hide-if-upload');

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(
                (eventName) => {
                    dropArea.addEventListener(
                        eventName,
                        preventDefaults,
                        false,
                    );
                },
            );

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            // Highlight drop area when item is dragged over it
            ['dragenter', 'dragover'].forEach((eventName) => {
                dropArea.addEventListener(
                    eventName,
                    () => {
                        dropArea.classList.add('bg-accent1/50');
                    },
                    false,
                );
            });

            ['dragleave', 'drop'].forEach((eventName) => {
                dropArea.addEventListener(
                    eventName,
                    () => {
                        console.log('i leave');
                        dropArea.classList.remove('bg-accent1/50');
                    },
                    false,
                );
            });

            // Handle dropped files
            dropArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                let dt = e.dataTransfer;
                let files = dt.files;
                // Pass the file to the input element
                fileInput.files = files;
                handleUploadVisually(files[0].name);
            }

            function handleUploadVisually(fileName) {
                fileResult.textContent = fileName;
                console.log(hideIfUpload.style.display);
                hideIfUpload.style.display = 'none';
            }
        });
    </script>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button
            id="cancel"
            type="button"
            class="text-sm font-semibold leading-6 text-gray-900"
        >
            Atcelt
        </button>
        <button
            type="submit"
            class="rounded-md bg-accent1 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-dark1 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-dark1"
        >
            Nosūtīt
        </button>
    </div>
    <script></script>
</form>
