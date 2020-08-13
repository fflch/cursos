ONZE = ['2011', '211']
UM = ['1']
def normAno(colunaAno, n):
    '''[list, int] -> None
    Recebe uma coluna de strings, identifica quais elementos são inteiros 
    e modifica o elemento para None caso não for inteiro.
    '''
    for i in range(n):
        if type(colunaAno[i]) == str and colunaAno[i].isnumeric() == False or colunaAno[i] in UM:
            colunaAno[i] = None
        elif colunaAno[i] in ONZE:
            colunaAno[i] = ONZE[0]
