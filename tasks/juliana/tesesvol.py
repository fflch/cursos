def normVol(colunaVol, n):
    '''[list, n] -> None
    Recebe uma coluna de strings, identifica quais elementos são inteiros 
    e modifica o elemento para None caso não for inteiro.
    '''
    for i in range(n):
        if type(colunaVol[i]) == str and colunaVol[i].isnumeric() == False:
            colunaVol[i] = None