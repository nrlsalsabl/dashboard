<div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="add-user-modal">
    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold dark:text-white">
                    Tambah Data Project
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="add-user-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="/project" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <!-- NAMA PROJECT -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Project</label>
                            <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Project Digital Ads" required>
                        </div>

                        <!-- PIC -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="pic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PIC</label>
                            <select name="pic" id="pic" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                                @foreach ($staffs as $staff)
                                    <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Brand -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                            <select name="brand" id="brand" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Month and Year -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="month_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bulan dan Tahun</label>
                            <input type="month" name="month_year" id="month_year" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        </div>

                        <!-- Nama Talent -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="talent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Talent</label>
                            <select name="talent" id="talent" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                                @foreach ($talents as $talent)
                                    <option value="{{ $talent->id }}">{{ $talent->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Agency -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="agency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agency</label>
                            <select name="agency" id="agency" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                                @foreach ($agencies as $agency)
                                    <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Scope -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="scope" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scope</label>
                            <select name="scope" id="scope" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                                @foreach ($scopes as $scope)
                                    <option value="{{ $scope->id }}">{{ $scope->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Qty -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qty</label>
                            <input type="number" name="qty" id="qty" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" min="1" max="100" required>
                        </div>

                        <!-- Rate Brand -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="rate_brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Brand</label>
                            <input type="number" name="rate_brand" id="rate_brand" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" step="0.01" required>
                        </div>

                        <!-- Rate Talent -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="rate_talent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Talent</label>
                            <input type="number" name="rate_talent" id="rate_talent" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" step="0.01" required>
                        </div>

                        <!-- Tanggal Pelunasan Talent -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="payment_date_talent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pelunasan Talent</label>
                            <input type="date" name="payment_date_talent" id="payment_date_talent" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>

                        <!-- Tanggal Pelunasan Brand -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="payment_date_brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pelunasan Brand</label>
                            <input type="date" name="payment_date_brand" id="payment_date_brand" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>

                        <!-- Description -->
                        <div class="col-span-6">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <textarea name="description" id="description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" rows="4"></textarea>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="items-center p-6 border-t border-gray-200 rounded-b">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
