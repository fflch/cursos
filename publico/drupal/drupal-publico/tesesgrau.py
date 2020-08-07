GRAUS = [['Doutorado', 'DOUTORADO', 'doutorado', 'DOUTORADo', 'DOUTIRADO', 'doutoramento', 'Doutor', 'Doutoradoq', 'doutor', 'DUTORADO', 'DOYTORADO', 'Doutorada', 'DOURADO', 'Doutoraado', 'Doutrorado', 'Doutoado', 'doutora', 'd'], ['Mestrado', 'MESTRADO', 'mestrado', 'MESTRADOMESTRADO', 'm', 'Mestrada', 'M estrado', 'Mestardo', 'MSTRADO', 'MESTRDO', 'MESTRADo', 'MestradoMestrado', 'MESTARDO', 'MESTRARDO', 'Mestre', 'MSETRADO', 'METRADO', 'Metrado'], ['Livre-Docência', 'livre-docência', 'Livre Docência', 'Livre -docencia', 'LIVRE DOCENTE', 'Livre-docência', 'Livre Docencia', 'Livre docência', 'Livre-Docênacia' , 'Livre-Docencia', 'Livre-Docente', '"livre Docente"', 'LIVRE DOCENCIA', 'Livre--docência']]
#---------------------------------------
def normGrau(colunaGrau, n):
    '''[list, n] -> None
    Recebe a coluna "grau", identifica quais elementos são "Mestrado", 
    "Doutorado" e "Livre-Docência" e os substitui conforme a categoria,
    padronizando as entradas. Se o elemento não corresponder a nenhuma
    destas categorias, substitui o elemento por None.
    '''
    flag = False
    for i in range(n):
        for j in range(len(GRAUS)):
            if colunaGrau[i] in GRAUS[j]:
                colunaGrau[i] = GRAUS[j][0]
                flag = True
        if flag == False:
            colunaGrau[i] = None
        flag = False

            