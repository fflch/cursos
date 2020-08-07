'''
Autora: Juliana Saotome
GitHub: @sa0tome

Programa que normaliza algumas categorias
do arquivo teses.csv.

API:
    *tesesgrau
    *tesesdepartamento
    *tesesano
    *tesespaginas
    *tesesvol
'''
import pandas as pd
import tesesgrau as tg
import tesesdepartamento as td
import tesesano as ta
import tesespaginas as tp 
import tesesvol as tv
#-------------------
CSV = 'teses.csv'
#-------------------
#
def main():
    # leitura
    df = pd.read_csv(CSV)
    
    # tg
    n = len(df['grau'])
    colunaGrau = df['grau']
    tg.normGrau(colunaGrau, n)
    
    # td
    colunaDepart = df['departamento']
    td.normDepart(colunaDepart, n)

    # ta
    colunaAno = df['ano']
    ta.normAno(colunaAno, n)

    # tp
    colunaPag = df['paginas']
    tp.normPag(colunaPag, n)

    # tv
    colunaVol = df['volumes']
    tv.normVol(colunaVol, n)
    
    # exportação
    df.to_csv('teste1.csv', index=False)

#--------testes---------
    # testes unique
    df = pd.read_csv('teste1.csv')
    print(colunaGrau.unique())
    print(colunaDepart.unique())
    print(colunaAno.unique())
    print(colunaPag.unique())
    print(colunaVol.unique())
    
main()