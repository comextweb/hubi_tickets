@if ($customFields)
    @foreach ($customFields as $customField)
        @if ($customField->custom_id == '1')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label for="name" class="form-label">{{ __($customField->name) }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    <div class="form-icon-user">
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                            id="name" name="name" placeholder="{{ __($customField->placeholder) }}" required=""
                            value="{{ old('name') }}">
                        <div class="invalid-feedback d-block">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                </div>
            </div>
        @elseif($customField->custom_id == '2')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label for="email" class="form-label">{{ __($customField->name) }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    <div class="form-icon-user">
                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                            id="email" name="email" placeholder="{{ __($customField->placeholder) }}"
                            required="" value="{{ old('email') }}">
                        <div class="invalid-feedback d-block">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                </div>
            </div>
        @elseif($customField->custom_id == '3')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label for="subject" class="form-label">{{ __($customField->name) }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    <div class="form-icon-user">
                        <input type="text" class="form-control {{ $errors->has('subject') ? ' is-invalid' : '' }}"
                            id="subject" name="subject" placeholder="{{ __($customField->placeholder) }}"
                            required="" value="{{ old('subject') }}">
                        <div class="invalid-feedback d-block">
                            {{ $errors->first('subject') }}
                        </div>
                    </div>
                </div>
            </div>
        @elseif($customField->custom_id == '4')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label for="category" class="form-label">{{ __($customField->name) }}</label>
                    <x-tooltip :description="$customField->description ?? null" />

                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    <select class="form-select" id="category" name="category" required
                        data-placeholder="{{ __($customField->placeholder) }}">
                        <option value="">{{ __($customField->placeholder) }}</option>
                        @foreach ($categoryTree as $category)
                            <option value="{{ $category['id'] }}" @if (old('category') == $category['id']) selected @endif>
                                {!! $category['name'] !!}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback d-block">
                        {{ $errors->first('category') }}
                    </div>
                </div>

            </div>
        @elseif($customField->custom_id == '5')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label for="priority" class="form-label">{{ __($customField->name) }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    <select class="form-select" id="priority" name="priority" required
                        data-placeholder="{{ __($customField->placeholder) }}">
                        <option value="">{{ __($customField->placeholder) }}</option>
                        @foreach ($priorities as $priority)
                            <option value="{{ $priority->id }}" @if (old('priority') == $priority->id) selected @endif>
                                {{ $priority->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback d-block">
                        {{ $errors->first('priority') }}
                    </div>
                </div>
            </div>
        @elseif($customField->custom_id == '6')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    <textarea name="description"
                        class="form-control summernote-simple {{ $errors->has('description') ? 'is-invalid' : '' }}"
                        placeholder="{{ __($customField->placeholder) }}" required="">{{ old('description') }}</textarea>
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                    <p class="text-danger summernote_text"></p>
                </div>
            </div>
        @elseif($customField->custom_id == '7')
            {{-- <x-mobile divClass="col-md-6"></x-mobile> --}}

            <div class="form-group col-md-12">
                <label class="require form-label"> {{ $customField->name}}
                    <small>({{ $customField->placeholder }})</small> </label>
                <x-tooltip :description="$customField->description ?? null" />
                <div class="choose-file form-group">
                    <label for="file" class="form-label d-block">
                        <input type="file" name="attachments[]" id="file"
                            class="form-control  @error('attachments') is-invalid @enderror"
                            multiple="" data-filename="multiple_file_selection"
                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
                        
                        @error('attachments')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>
                </div>
                <p class="multiple_file_selection mb-0"></p>
            </div>
            
        @elseif($customField->custom_id == '8')
            @if (moduleIsActive('OutOfOffice'))
                @stack('is_available')
            @else
                <div class="col-lg-{{ $customField->width }}">
                    <div class="form-group mb-3 {{ $customField->width }}">
                        <label for="agent" class="form-label">{{ __($customField->name) }}</label>
                        <x-tooltip :description="$customField->description ?? null" />
                        @if ($customField->is_required == 1)
                            <x-required></x-required>
                        @endif
                        <select class="form-control @error('agent') is-invalid @enderror" 
                            id="agent" name="agent" required
                            data-placeholder="{{ __($customField->placeholder) }}">
                            <option value="">{{ __($customField->placeholder) }}</option>
                            @isset($users) {{-- Verifica que la variable exista --}}
                                @foreach ($users as $agent)
                                    <option value="{{ $agent->id }}" 
                                        {{ old('agent') == $agent->id ? 'selected' : '' }}>
                                        {{ $agent->name }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                        @error('agent')
                            <div class="invalid-feedback d-block">
                                {{ $errors->first('agent') }}
                            </div>
                        @enderror
                    </div>
                </div>
            @endif

        @elseif($customField->custom_id == '9')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label for="department_id" class="form-label">{{ __($customField->name) }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    <select class="form-control @error('department_id') is-invalid @enderror" 
                        id="department_id" name="department_id" 
                        @if($customField->is_required == 1) required @endif
                        data-placeholder="{{ __($customField->placeholder) }}">
                        <option value="">{{ __($customField->placeholder) }}</option>
                        @isset($departments)
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" 
                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        @endisset
                    </select>
                    @error('department_id')
                        <div class="invalid-feedback d-block">
                            {{ $errors->first('department_id') }}
                        </div>
                    @enderror
                </div>
            </div>
        
        @elseif($customField->type == 'text')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3{{ $customField->width }}">
                    <label name="{{ 'customField-' . $customField->id }}"
                        class="form-label">{{ $customField->name }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    @if ($customField->is_required == 1)
                        <input type="text" name="{{ 'customField[' . $customField->id . ']' }}"
                            value="{{ $customField->getData($ticket, $customField->id) }}" class="form-control"
                            placeholder="{{ $customField->placeholder }} " required>
                    @else
                        <input type="text" name="{{ 'customField[' . $customField->id . ']' }}"
                            value="{{ $customField->getData($ticket, $customField->id) }}" class="form-control"
                            placeholder="{{ $customField->placeholder }} ">
                    @endif
                </div>
            </div>
        @elseif($customField->type == 'email')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label name="{{ 'customField-' . $customField->id }}"
                        class="form-label">{{ $customField->name }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    @if ($customField->is_required == 1)
                        <input type="email" name="{{ 'customField[' . $customField->id . ']' }}"
                            value="{{ $customField->getData($ticket, $customField->id) }}" class="form-control"
                            placeholder="{{ $customField->placeholder }} " required>
                    @else
                        <input type="text" name="{{ 'customField[' . $customField->id . ']' }}"
                            value="{{ $customField->getData($ticket, $customField->id) }}" class="form-control"
                            placeholder="{{ $customField->placeholder }} ">
                    @endif
                </div>
            </div>
        @elseif($customField->type == 'number')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label name="{{ 'customField-' . $customField->id }}"
                        class="form-label">{{ $customField->name }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    @if ($customField->is_required == 1)
                        <input type="number" name="{{ 'customField[' . $customField->id . ']' }}"
                            value="{{ $customField->getData($ticket, $customField->id) }}" class="form-control"
                            placeholder="{{ $customField->placeholder }} " required>
                    @else
                        <input type="text" name="{{ 'customField[' . $customField->id . ']' }}"
                            value="{{ $customField->getData($ticket, $customField->id) }}" class="form-control"
                            placeholder="{{ $customField->placeholder }} ">
                    @endif
                </div>
            </div>
        @elseif($customField->type == 'date')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label name="{{ 'customField-' . $customField->id }}"
                        class="form-label">{{ $customField->name }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    @if ($customField->is_required == 1)
                        <input type="date" name="{{ 'customField[' . $customField->id . ']' }}"
                            value="{{ $customField->getData($ticket, $customField->id) }}" class="form-control"
                            placeholder="{{ $customField->placeholder }} " required>
                    @else
                        <input type="number" name="{{ 'customField[' . $customField->id . ']' }}"
                            value="{{ $customField->getData($ticket, $customField->id) }}" class="form-control"
                            placeholder="{{ $customField->placeholder }} ">
                    @endif
                </div>
            </div>
        @elseif($customField->type == 'textarea')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label name="{{ 'customField-' . $customField->id }}"
                        class="form-label">{{ $customField->name }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif


                    @if ($customField->is_required == 1)
                        <textarea name="customField[{{ $customField->id }}]" class="form-control summernote-simple"
                            placeholder="{{ __($customField->placeholder) }}" required>{{ $customField->getData($ticket, $customField->id) }}</textarea>
                    @else
                        <textarea name="customField[{{ $customField->id }}]" class="form-control summernote-simple"
                            placeholder="{{ __($customField->placeholder) }}">{{ $customField->getData($ticket, $customField->id) }}</textarea>
                    @endif
                    <p class="text-danger summernote_text"></p>
                </div>
            </div>
        @elseif($customField->type == 'file')
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label name="{{ 'customField-' . $customField->id }}"
                        class="form-label">{{ $customField->name }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    @if ($customField->is_required == 1)
                        <div class="choose-file form-group">
                            <label for="file" class="form-label d-block">
                                <input type="file" name="{{ 'customField[' . $customField->id . ']' }}"
                                    id="file"
                                    class="form-control mb-2 @error('attachments') is-invalid @enderror"
                                    multiple="" data-filename="multiple_file_selection"
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                                    {{ $customField->getData($ticket, $customField->id) ? '' : 'required' }}>
                                @if ($customField->getData($ticket, $customField->id) != null)
                                    <img src="{{ getFile($customField->getData($ticket, $customField->id)) }}"
                                        id="blah" width="20%" />
                                @endif
                            </label>
                        </div>
                    @else
                        <div class="choose-file form-group">
                            <label for="file" class="form-label d-block">
                                <input type="file" name="{{ 'customField[' . $customField->id . ']' }}"
                                    id="file"
                                    class="form-control mb-2  @error('attachments') is-invalid @enderror"
                                    multiple="" data-filename="multiple_file_selection"
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </label>
                            @if ($customField->getData($ticket, $customField->id) != null)
                                <img src="{{ getFile($customField->getData($ticket, $customField->id)) }}"
                                    id="blah" width="20%" />
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        @elseif($customField->type == 'select')
            @php
                $fieldType = !empty($customField->fieldValue)
                    ? array_column(json_decode($customField->fieldValue, true), 'field_value')
                    : [];
            @endphp
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label name="{{ 'customField-' . $customField->id }}"
                        class="form-label">{{ $customField->name }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    @if ($customField->is_required == 1)
                        <select class="form-select" id="priority"
                            name="{{ 'customField[' . $customField->id . ']' }}" required
                            data-placeholder="{{ __($customField->placeholder) }}">
                            <option value="">{{ __($customField->placeholder) }}</option>
                            @foreach ($fieldType as $key => $value)
                                <option value="{{ $value }}"
                                    {{ $customField->getData($ticket, $customField->id) == $value ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    @else
                        <select class="form-select" id="priority"
                            name="{{ 'customField[' . $customField->id . ']' }}"
                            data-placeholder="{{ __($customField->placeholder) }}">
                            <option value="">{{ __($customField->placeholder) }}</option>
                            @foreach ($fieldType as $key => $value)
                                <option value="{{ $value }}"
                                    {{ $customField->getData($ticket, $customField->id) == $value ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
        @elseif($customField->type == 'checkbox')
            @php
                $values = !empty($customField->fieldValue)
                    ? array_column(json_decode($customField->fieldValue, true), 'field_value')
                    : [];
            @endphp
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label name="{{ 'customField-' . $customField->id }}"
                        class="form-label">{{ $customField->name }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    <div class="d-flex align-items-center gap-2">
                        @if ($customField->is_required == 1)
                            @foreach ($values as $value)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="{{ 'customField[' . $customField->id . '][]' }}"
                                        value="{{ $value }}" class="form-check-input"
                                        {{ in_array($value, explode(',', $customField->getData($ticket, $customField->id))) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $value }}</label>
                                </div>
                            @endforeach
                        @else
                            @foreach ($values as $value)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="{{ 'customField[' . $customField->id . '][]' }}"
                                        value="{{ $value }}" class="form-check-input"
                                        {{ in_array($value, explode(',', $customField->getData($ticket, $customField->id))) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $value }}</label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @elseif($customField->type == 'radio')
            @php
                $values = !empty($customField->fieldValue)
                    ? array_column(json_decode($customField->fieldValue, true), 'field_value')
                    : [];
            @endphp
            <div class="col-lg-{{ $customField->width }}">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label name="{{ 'customField-' . $customField->id }}"
                        class="form-label">{{ $customField->name }}</label>
                    <x-tooltip :description="$customField->description ?? null" />
                    @if ($customField->is_required == 1)
                        <x-required></x-required>
                    @endif
                    <div class="d-flex align-items-center gap-2">
                        @if ($customField->is_required == 1)
                            @foreach ($values as $value)
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="{{ 'customField[' . $customField->id . ']' }}"
                                        value="{{ $value }}" class="form-check-input"
                                        {{ $customField->getData($ticket, $customField->id) == $value ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $value }}</label>
                                </div>
                            @endforeach
                        @else
                            @foreach ($values as $value)
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="{{ 'customField[' . $customField->id . ']' }}"
                                        value="{{ $value }}" class="form-check-input"
                                        {{ $customField->getData($ticket, $customField->id) == $value ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $value }}</label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script type="text/javascript">
    $('#chooseFile').bind('change', function() {
        var filename = $("#chooseFile").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass('active');
            $("#noFile").text("No file chosen...");
        } else {
            $(".file-upload").addClass('active');
            $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });
</script>
