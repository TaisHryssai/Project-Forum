<form action="" method="POST"  novalidate enctype="multipart/form-data">
    @csrf

        @component('components.form.input_file', ['field'    => 'attachment',
                                              'model'    => 'ask',
                                              'required' => false,
                                              'errors'   => $errors]) @endcomponent

        <button type="submit" class="btn btn-primary" style="margin-left: 82%">Adicionar Anexos</button>
</form>