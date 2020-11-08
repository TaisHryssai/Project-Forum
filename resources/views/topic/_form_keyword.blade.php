<form action="" method="POST"  novalidate enctype="multipart/form-data">
    @csrf
        @component('components.form.input_text', ['field'    => 'keywords',
                                              'label'    => 'Palavras-Chave',
                                              'placeholder' => 'Ex: youtube, linux',
                                              'model'    => 'ask',
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent

        <button type="submit" class="btn btn-primary" style="margin-left: 82%">Adicionar Palavras-Chave</button>
</form>