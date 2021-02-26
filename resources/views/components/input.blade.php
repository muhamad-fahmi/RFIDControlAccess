<input type="{{ $type }}" class="form-control mb-2" name="{{ strtolower(str_replace(' ', '', $field)) }}" placeholder="Enter {{ ucwords($field) }}"
@isset($value)
    value="{{ old($field) ? old($field) : $value }}"
    @else
    value="{{ old($field) }}"
@endisset
>

