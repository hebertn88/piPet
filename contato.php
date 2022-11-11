<!-- Contato -->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contato para Parcerias</h2>
        </div>
        
        <form class="add_msg form" method="POST" action="" id="contactForm" enctype="multipart/form-data">
            <div class="d-flex flex-column">
                <div class="d-flex flex-row gap-3">
                    <div class="flex-fill">
                        <div class="form-group">
                            <!-- Nome -->
                            <input class="form-control" name="nome" id="name" type="text" placeholder="Seu nome" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">Nome é obrigatório.</div>
                        </div>                        
                    </div>                        
                    <div class="flex-fill">
                        <div class="form-group">
                            <!-- Email-->
                            <input class="form-control" id="email" name="email" type="email" placeholder="Seu e-mail" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">E-mail é obrigatório.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">E-mail não é válido.</div>
                        </div>
                    </div>
                    <div class="flex-fill">
                        <div class="form-group">
                            <!-- Phone number input-->
                            <input class="form-control" id="telefone" name="telefone" type="tel" placeholder="Seu telefone" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">Telefone é obrigatório.</div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="form-group">
                        <!-- Titulo -->
                        <input class="form-control" name="title" id="title" type="text" placeholder="Título" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">Título é obrigatório.</div>
                    </div>
                    <div class="form-group">
                        <!-- Mensagem -->
                        <textarea class="form-control" id="message" name="msg" rows="3" placeholder="Insira sua mensagem" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Mensagem é obrigatória.</div>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center gap-3">
                    <!-- Logo -->
                    <div>
                        <div class="form-group">
                            <label for="formFile" class="form-label align-self-center text-light">Envie sua Logo:</label>
                        </div>
                    </div>
                    <div class="flex-fill">
                        <div class="form-group">
                            <input class="form-control" type="file" id="formFile" name="formFile" accept=".png, .jpg, .jpeg" data-sb-validations="required">
                            <div class="invalid-feedback" data-sb-feedback="message:required">Logo é obrigatória.</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Botao Enviar -->
            <div class="text-center">
                <input class="btn btn-primary field botao px-5" type="submit" value="Enviar" name="SendAddMsg" />
            </div>
        </form>
    </div>
</section>
<!-- FIM Contato -->