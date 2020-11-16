<div class="row">

    @foreach($formFields as $rowIndex => $field)

        @php 
            if($errors->has($field['id'])) {   
                $field['attributes']['class']  = isset($field['attributes']['class']) ? $field['attributes']['class'] : [];
                $field['attributes']['class'] .= ' is-invalid';
            }
        @endphp

        <div class="{{ isset($field['parent_class']) ? $field['parent_class'] : '' }}">
            <div class="form-group">
                {!! Form::label($field['id'], trans('validation.attributes.' . $field['title']) ) !!}
                    
                @switch($field['type'])

                    @case('text')
                        {!! Form::text($field['id'], old($field['id']) ? old($field['id']) : $field['value'], $field['attributes']) !!} 
                    @break

                    @case('email')
                        {!! Form::email($field['id'], old($field['id']) ? old($field['id']) : $field['value'], $field['attributes']) !!} 
                    @break

                    @case('number')
                        {!! Form::number($field['id'], old($field['id']) ? old($field['id']) : $field['value'], $field['attributes']) !!} 
                    @break

                    @case('password')
                        {!! Form::password($field['id'], $field['attributes']) !!} 
                    @break

                    @case('textarea')
                        {!! Form::textarea($field['id'], old($field['id']) ? old($field['id']) : $field['value'], $field['attributes']) !!} 
                    @break

                    @case('file')
                        {!! Form::file($field['id'], $field['attributes']) !!} 
                    @break

                    @case('date')
                        {!! Form::date($field['id'], old($field['id']) ? old($field['id']) : $field['value'], $field['attributes']) !!} 
                    @break

                    @case('select')
                        {!! Form::select($field['id'], $field['options'], old($field['id']) ? old($field['id']) : $field['value'], $field['attributes']) !!}
                    @break

                    @case('url')
                        {!! Form::url($field['id'], old($field['id']) ? old($field['id']) : $field['value'], $field['attributes']) !!} 
                    @break
                    
                    @case('time')
                        {!! Form::time($field['id'], old($field['id']) ? old($field['id']) : $field['value'], $field['attributes']) !!} 
                    @break

                @endswitch
                            
                @error($field['id'])
                    <span class="help-block text-muted" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
            </div>
        </div>
            
    @endforeach

</div>