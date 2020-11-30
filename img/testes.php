
<form method="post" action="">
                <h3>Busca</h3>
                <h4>Categorias</h4>
                <input  type="hidden" name="local" value="" />
                <select class="input1" type="text" size="7" style="width:600px; background-color: #fff; color:#000; padding-left: 15px;" name="categoria" >
                    <?php
                    $nomes_encontrados = listarNomes("usuarios");
                    if (!empty($nomes_encontradas)):
                        foreach ($nomes_encontradas as $local):
                            // print_r($local);
                            ?>                          
                            <option value="<?php echo $local->nomes ?>"><?php echo $local->nomes ?>    
                                <?php
                            endforeach;
                        else:
                            ?>
                            Nenhuma entrada para processar!
                        <?php
                        endif;
                        ?>
                </select><br><br>

                <div class="botonstop">
                <input class="btn btn-success" type="submit" value="pesquisar">
                </div>
            </form>       
            <?php
            @$busca = filter_var($_POST['nome'], FILTER_SANITIZE_MAGIC_QUOTES);
// print_r($busca);
            if (!empty($_POST['nome'])): //para obter o nome da categoria           
                $tarefas_encontradas = listarBusca('sua_tabela', $busca);
                foreach ($tarefas_encontradas as $caixa):
                    //  print_r($caixa);
                    ?> 
<!--Exemplo do relatório-->
                    <div class="post">                    
                        Tarefa n&#186  <?php echo $caixa->id_coluna_tabela; ?> |                     
                        Projeto n&#186 <?php echo $caixa->num_projeto_coluna_tabela; ?><br>
                        Data agendada: <?php echo $caixa->data_alvo_coluna_tabela; ?><br>
                        Última atualização:  <?php echo $caixa->data_coluna_tabela; ?><br>
                        <div>Categoria: <?php echo $caixa->categoria_coluna_tabela; ?></div><br>
                        Resumo: 
                        <div class="descrresum"><?php echo $caixa->titulo_resumido_coluna_tabela; ?></div><br>
                        Descrição:
                        <div  class="descrdescr"><?php echo $caixa->hist_coluna_tabela; ?></div><br>                        
                        <div class="botons">
                        <input class="btn btn-mini btn-info" type="button" VALUE="► Editar" onclick="location.href = '?p=actplan_alter&id=<?php echo $caixa->id; ?>';">
               <?php
                endforeach;
                ?>
                <?php
            else:
                echo '<h3 style="color: orange;">Nenhuma categoria selecionada!</h3> <h6 style="color:red;">Selecione <span style="color: black;">CLASSIFICAR</span> para ver tarefas sem categoria';
            endif;
            ?>