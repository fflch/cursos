import pandas as pd
#-------------------
MIN = 170001
MAX = 185650
#-------------------
def addNid(df):
    '''
    [list] -> None
    Adiciona a coluna nid e a popula com zeros.
    Transforma os valores nid de acordo com o 
    intervalo selecionado para cada pessoa.
    '''
    df.insert(0, 'field_nid', 0)
    colunaNid = df['field_nid']
    j = 0
    for i in range(MIN, MAX):
        colunaNid[j] = i
        j += 1