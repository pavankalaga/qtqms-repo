<div id="{{ $id ?? 'lis-interface-validation-log' }}" class="main inactive">
    <div class="d-flex align-items-center heading mb-4 expandedHeading">
        <div class="d-flex align-items-center expandedHeadingVisible">
            <label class="doc-detail">Doc No.: <strong>{{ $docNo }}</strong></label>
            <label class="doc-detail">Doc Name: <strong>{{ $docName }}</strong></label>
            <label class="doc-detail">Issue No.: <strong>{{ $issueNo }}</strong></label>
            <label class="doc-detail">Issue Date: <strong>{{ $issueDate }}</strong></label>
            <button type="button" class="btn btn-warning" id="{{ $buttonId ?? 'submitBtn1' }}">
                {{ $buttonText ?? 'Submit' }}
            </button>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-3 mb-3">
        <button class="button" onclick="goBack(this)">
            <svg class="svgIcon" viewBox="0 0 384 512">
                <path
                    d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 
                    0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 
                    32s32-14.3 32-32V141.2L329.4 246.6c12.5 
                    12.5 32.8 12.5 45.3 0s12.5-32.8 
                    0-45.3l-160-160z"
                    transform="rotate(-90, 192, 256)">
                </path>
            </svg>
        </button>
    </div>

    <div class="table-responsive mt-4">
        {{ $slot }}
    </div>
</div>
