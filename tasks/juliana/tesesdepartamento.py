DEPARTAMENTOS = [['Antropologia', 'DA', 'Antropologiua', 'Antopologia', 'ANTROPOLOGIA', 'antropologia'], ['Ciência Política', 'Ciências Política', 'DCP', 'Ciência Politica', 'Ciencia Politica', 'CP', 'CIENCIA POLITICA', 'Cioencia Politica', 'Ciencia Política', 'Ciências Políticas', 'Depto. Ciência Política', 'Ciencia Politttica', 'DP'], ['Filosofia', 'DF', 'FILOSIFIA', 'FILOZOFIA', 'FIlosofia', 'FILOSOFIA', 'D.F'], ['Geografia', 'DG', 'GEOGRAFIA', 'geografia', 'D.G'], ['História', 'Hístoria', 'HISTORIA', 'Historia', 'história'], ['Letras Clássicas e Vernáculas', 'DLCV', 'LCV', 'Letras Clássicas e Vernáculas e Vernáculas', 'Letras Clássicas e Vernáculass', 'Departamento de Letras Clássicas e Vernáculas', 'DLC', 'Classicas e vernaculas', 'classicas Vernaculas', 'Letras (clássicas e vernáculas)', 'Letras Classicas'], ['Letras Modernas', 'DLM', 'Letras Moderna', 'LM', 'Letras Modernass', 'Línguas Modernas', 'Línguas modernas', 'Letras (Modernas)'], ['Letras Orientais', 'DLO', 'LETRAS ORIENTAIS', 'Línguas Orientais', 'Letras (Orientais)', 'Lingua Orientais'], ['Linguística', 'DL', 'Linguistica', 'LINGUISTICA', 'dl', 'D.Linguística', 'inguística', 'Lingüística'], ['Sociologia', 'DS', 'SOCIOLOGIA', 'Pós garduação Socilogia'], ['Teoria Literária e Literatura Comparada', 'Teoria Literária e Literaura Comparada', 'DTLLC', 'DTLL', 'Teoria Litéraria e Literatura Comparada', 'TLLC', 'Teoria Literaria', 'Teoria Literária', 'Teoria Literaria e Literatura Comparada']]
#---------------------------------------
def normDepart(colunaDepart, n):
    '''[list, n] -> None
    Recebe a coluna "departamento", identifica quais elementos correspondem
    aos onze departamentos da FFLCH e os substitui conforme a categoria,
    padronizando as entradas. Se o elemento não corresponder a nenhuma
    destas categorias, substitui o elemento por None.
    '''
    flag = False
    for i in range(n):
        for j in range(len(DEPARTAMENTOS)):
            if colunaDepart[i] in DEPARTAMENTOS[j]:
                colunaDepart[i] = DEPARTAMENTOS[j][0]
                flag = True
        if flag == False:
            colunaDepart[i] = None
        flag = False
