<button type="button" data-modal-target="edit-project-modal-{{ $project->id }}" data-modal-toggle="edit-project-modal-{{ $project->id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
    Edit Project
</button>

<div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="edit-project-modal-{{ $project->id }}">
    <div class="relative w-full h-full max-w-2xl px-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold dark:text-white">
                    Edit Project
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="edit-project-modal-{{ $project->id }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>

            <div class="p-6 space-y-6">
                <form action="/project/{{ $project->id }}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <!-- PIC -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="staff_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PIC</label>
                            <select name="staff_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected>Pilih PIC</option>
                                    @foreach ($staffs as $staff)
                                        <option value="{{ $staff->id }}" {{ old('staff_id', $project->staff_id) == $staff->id ? 'selected' : '' }}>{{ $staff->name }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <!-- Brand -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="brand_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                            <select name="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected>Pilih Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id', $project->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Bulan dan Tahun -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="month_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bulan dan Tahun</label>
                            <input type="month" name="month_year" value="{{ old('month_year', $project->month_year) }}" id="month_year" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>

                        <!-- Nama Talent -->
                        <!-- <div class="col-span-6 sm:col-span-3">
                            <label for="talent_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Talent</label>
                            <select name="talent_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected>Pilih Talent</option>
                                @foreach ($talents as $talent)
                                    <option value="{{ $talent->id }}" {{ old('talent_id', $project->talent_id) == $talent->id ? 'selected' : '' }}>{{ $talent->name }}</option>
                                @endforeach
                            </select>
                        </div> -->

                        <!-- Agency -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="agency_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agency</label>
                            <select name="agency_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected>Pilih Agency</option>
                                @foreach ($agencies as $agency)
                                    <option value="{{ $agency->id }}" {{ old('agency_id', $project->agency_id) == $agency->id ? 'selected' : '' }}>{{ $agency->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Scope -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="scope_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scope</label>
                            <select name="scope_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected>Pilih Scope</option>
                                @foreach ($scopes as $scope)
                                    <option value="{{ $scope->id }}" {{ old('scope_id', $project->scope_id) == $scope->id ? 'selected' : '' }}>{{ $scope->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Qty -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qty</label>
                            <input type="number" name="qty" value="{{ old('qty', $project->qty) }}" id="qty" min="1" max="100" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>

                        <!-- Rate Brand -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="rate_brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Brand</label>
                            <input type="number" name="rate_brand" value="{{ old('rate_brand', $project->rate_brand) }}" id="rate_brand" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>

                        <!-- Rate Talent -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="rate_talent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Talent</label>
                            <input type="number" name="rate_talent" value="{{ old('rate_talent', $project->rate_talent) }}" id="rate_talent" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>

                        <!-- Tanggal Pelunasan ke Talent -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="payment_date_talent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pelunasan ke Talent</label>
                            <input type="date" name="payment_date_talent" value="{{ old('payment_date_talent', $project->payment_date_talent) }}" id="payment_date_talent" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>

                        <!-- Tanggal Pelunasan dari Brand -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="payment_date_brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pelunasan dari Brand</label>
                            <input type="date" name="payment_date_brand" value="{{ old('payment_date_brand', $project->payment_date_brand) }}" id="payment_date_brand" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>

                        <!-- Keterangan -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <textarea name="remarks" id="remarks" rows="4" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>{{ old('remarks', $project->remarks) }}</textarea>
                        </div>
                    </div>

                    <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" class="text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-500 dark:focus:ring-gray-700" data-modal-toggle="edit-project-modal-{{ $project->id }}">
                            Close
                        </button>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
