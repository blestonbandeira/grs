<!doctype html>

<html>
    <head lang=pt-pt>
        <title> Formulário </title>
        <meta name="author" content="B Leston Bandeira, Inês Fialho, Sérgio Moura">
        <meta charset="utf-8">
    
    </head>

    <body>
        
        <h1> Guião de Entrevista </h1>
            
        <form>
            
            Entrevistador: 
            <input type="text" name="entrevistador">
            <br/>
            Data:
            <input type="date" name="data">

            <h2>Perfil do Candidato</h2>
            Nome Completo:
            <input type="text" name="nomeCompleto">
            <br/>
            Curso:
            <input type="text" name="curso">
            <br/>
            Antes de iniciar a entrevista, verifique as respostas do questionário (Conhecimentos técnicos da área ou experiência)
            <br/>
            <br/>
            Porque razão quer vir frequentar um curso de formação profissional e porque é que escolheu a ATEC?
            (motivação e interesse pela área)
            <br>
            <textarea name="motivacao" rows="10" cols="100">
            </textarea>
            <br/>

            <p> Notas para o entrevistador - NÃO ESQUECER! </p>  
            Apenas para <strong>Aprendizagem</strong>:
            <br/>
            <ul>
                <li><u> Analisar o relatório IPPR para identificar preferências </u> - <strong> validar estas preferências com o candidato </strong></li>
            </ul>
            <br/>
            <textarea name="preferenciasA" rows="10" cols="100">
            </textarea>
            
            <br/>
            <br/>

            Para <strong>TODAS</strong> as modalidades de formação:
            <br/>
            (usar as brochuras da FP APZ e CETs)
            <ul>
                <li><u> Validar motivações e interesses </u> - <strong> validar 1ª e 2ª opções </strong> da ficha de inscrição. </li>
            </ul>
            <br/>
            <textarea name="preferenciasT" rows="10" cols="100">
            </textarea>

            <br/>
            <br/>
            Que percurso pensa fazer após o curso? Como se vê daqui a 5 anos? (objectivos de vida)
            <br/>
            <textarea name="objectivos" rows="10" cols="100">
            </textarea>

            <br/>
            <br/>
            Fale um pouco sobre si / Como se descreve a si próprio? / Quais os seus pontos fortes e menos fortes?
            <br/>
            <textarea name="descricao" rows="10" cols="100">
            </textarea>

            <br/>
            <br/>
            O que pensa sobre o cumprimento de horários e de regras? (dar a conhecer o horário do curso e explorar em conformidade as rotinas diárias necessárias)
            <br/>
            <textarea name="regras" rows="10" cols="100">
            </textarea>

            <br/>
            <br/>
            Com quem vive? (averiguar estrutura familiar)
            <br/>
            <textarea name="familia" rows="10" cols="100">
            </textarea>

            <br/>
            <br/>
            (não aplicável para APZ) Tem algum membro do agregado familiar desempregado? (saber que condições tem o candidato para permanecer no curso até à sua conclusão)
            <br/>
            <textarea name="desempregoFamilia" rows="10" cols="100">
            </textarea>

            <br/>
            <br/>
            Como ocupa os seus tempos livres? (alguma actividade relacionada com a área de motivação?)
            <br/>
            <textarea name="hobbies" rows="10" cols="100">
            </textarea>
        
            <br/>
            <br/>
            Enumere 3 razões que façam de si o candidato ideal para ser fomando da ATEC
            <br/>
            <textarea name="razoes" rows="10" cols="100">
            </textarea>

            <form>
            <fieldset>
                <legend>Observação durante a entrevista:</legend>
                    <h2>Critérios:</h2>
                        Apresentação Geral: 
                        <input type="radio" name="apresentacao" value="adequado" checked> Adequado
                        <input type="radio" name="apresentacao" value="desadequado"> Desadequado<br>
                        Postura face à entrevista/entrevistador: 
                        <input type="radio" name="postura" value="adequado" checked> Adequado
                        <input type="radio" name="postura" value="desadequado"> Desadequado<br>
                        <h4>Expressão Verbal</h4>
                        Hesitações/Pausas: 
                        <input type="radio" name="pausas" value="adequado" checked> Adequado
                        <input type="radio" name="pausas" value="desadequado"> Desadequado<br>        
                        Discurso Lógico: 
                        <input type="radio" name="discurso" value="adequado" checked> Adequado
                        <input type="radio" name="discurso" value="desadequado"> Desadequado<br> 
                        Compreensão das questões colocadas: 
                        <input type="radio" name="compreensao" value="adequado" checked> Adequado
                        <input type="radio" name="compreensao" value="desadequado"> Desadequado<br> 
            </fieldset>
            <br/>
            <br/>
            Observações gerais sobre o candidato
            <br/>
            <textarea name="observacoes" rows="10" cols="100">
            </textarea>

            <h2>Resultado da entrevista</h2>

            <input type="checkbox" name="resultado" value="Aceite"> Aceite<br/> 
            <input type="checkbox" name="resultado" value="AceiteReserva"> Aceite com reservas<br/>
            <input type="checkbox" name="resultado" value="NaoAceite"> Não Aceite<br/>

            Para os candidatos <strong>Aceites</strong>, avaliar de acordo com a escala (de 1 a 3): <br/>
            Avaliação: <br/>
            <input type="text" name="avaliacao">
            <br/>
            (1 - Razoável, 2 - Bom, 3 - Muito Bom)
            <br/>
            <table style="border: 1px solid black;">
                <tr>
                    <thead style="border: 1px solid black;">
                        <td> </td>
                        <td> 1 - Razoável </td>
                        <td> 2 - Bom </td>
                        <td> 3 - Muito Bom </td>
                    </thead> 
                </tr>
                <tbody style="border: 1px solid black;">
                    <tr>
                        <td> Motivação e interesse pela área pretendida </td> 
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> Experiência na área ou conhecimentos técnicos da mesma </td> 
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> Objectivos de vida bem delineados </td> 
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> Persistência para alcançar a meta pretendida </td> 
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> Capacidades de comunicação - discurso lógico e coerente </td> 
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> Competências de relacionamento interpessoal </td> 
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                </tbody>
            </table>

            <br/>
            <br/>
            Entrevistador:
            <input type="text" name="entrevistador">
            <br/>
            Data da entrevista:
            <input type="date" name="dataEntrevista">


        </form>

    </body>
</html>