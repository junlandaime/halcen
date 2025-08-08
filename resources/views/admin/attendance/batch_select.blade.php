@extends('template.layouts.index')

@section('title', 'Pilih Batch Presensi')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Pilih Batch Presensi</h2>
        <p class="text-gray-600 text-sm">Silakan pilih program layanan terlebih dahulu, kemudian pilih batch yang diinginkan</p>
    </div>

    <form action="{{ route('admin.rekap-presensi') }}" method="GET" id="batchForm">
        <!-- Step 1: Pilih Program Layanan -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <span class="inline-flex items-center">
                    <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold mr-2">1</span>
                    Program Layanan
                </span>
            </label>
            <select name="program_layanan" id="programLayanan" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" required>
                <option value="">-- Pilih Program Layanan --</option>
                @forelse($programLayanan as $program)
                    <option value="{{ $program->id }}">{{ $program->nama_program }}</option>
                @empty
                    <option disabled>Tidak ada program layanan tersedia</option>
                @endforelse
            </select>
        </div>

        <!-- Step 2: Pilih Batch -->
        <div class="mb-6" id="batchSection" style="display: none;">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <span class="inline-flex items-center">
                    <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold mr-2">2</span>
                    Batch
                </span>
            </label>
            <select name="batch" id="batchSelect" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" required disabled>
                <option value="">-- Pilih Batch --</option>
            </select>
            <div id="loadingBatch" class="hidden mt-2">
                <div class="flex items-center text-sm text-gray-600">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Memuat batch...
                </div>
            </div>
            <div id="errorBatch" class="hidden mt-2">
                <div class="text-sm text-red-600">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Gagal memuat batch. Silakan coba lagi.
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex gap-3">
            <button type="submit" id="submitBtn" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200 disabled:bg-gray-400 disabled:cursor-not-allowed" disabled>
                <span class="flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Lihat Rekap Presensi
                </span>
            </button>
            <button type="button" id="resetBtn" class="px-4 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const programSelect = document.getElementById('programLayanan');
    const batchSection = document.getElementById('batchSection');
    const batchSelect = document.getElementById('batchSelect');
    const loadingBatch = document.getElementById('loadingBatch');
    const errorBatch = document.getElementById('errorBatch');
    const submitBtn = document.getElementById('submitBtn');
    const resetBtn = document.getElementById('resetBtn');

    programSelect.addEventListener('change', function() {
        const selectedProgram = this.value;

        if (selectedProgram) {
            // Show batch section
            batchSection.style.display = 'block';

            // Show loading
            loadingBatch.classList.remove('hidden');
            errorBatch.classList.add('hidden');
            batchSelect.disabled = true;

            // Fetch batches via AJAX
            fetch(`{{ route('admin.get-batches-by-program') }}?program_id=${selectedProgram}`)
                .then(response => response.json())
                .then(data => {
                    // Clear previous options
                    batchSelect.innerHTML = '<option value="">-- Pilih Batch --</option>';

                    if (data.success && data.batches && data.batches.length > 0) {
                        data.batches.forEach(batch => {
                            const option = document.createElement('option');
                            option.value = batch.id;
                            option.textContent = `${batch.nama_batch} (Batch ${batch.batch_ke})`;
                            batchSelect.appendChild(option);
                        });
                        batchSelect.disabled = false;
                    } else {
                        batchSelect.innerHTML = '<option disabled>Tidak ada batch tersedia untuk program ini</option>';
                    }

                    // Hide loading
                    loadingBatch.classList.add('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    loadingBatch.classList.add('hidden');
                    errorBatch.classList.remove('hidden');
                    batchSelect.innerHTML = '<option disabled>Gagal memuat batch</option>';
                });
        } else {
            // Hide batch section
            batchSection.style.display = 'none';
            batchSelect.disabled = true;
            submitBtn.disabled = true;
        }
    });

    batchSelect.addEventListener('change', function() {
        submitBtn.disabled = !this.value;
    });

    resetBtn.addEventListener('click', function() {
        programSelect.value = '';
        batchSelect.value = '';
        batchSection.style.display = 'none';
        batchSelect.disabled = true;
        submitBtn.disabled = true;
        loadingBatch.classList.add('hidden');
        errorBatch.classList.add('hidden');
    });
});
</script>
@endsection
