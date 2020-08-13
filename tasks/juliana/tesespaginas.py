def normPag(colunaPag, n):
    '''[list, n] -> None
    Recebe uma coluna de strings, identifica quais elementos são inteiros 
    e modifica o elemento para None caso não for inteiro.
    '''
    for i in range(n):
        if type(colunaPag[i]) == str and colunaPag[i].isnumeric() == False:
            colunaPag[i] = None