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
    *tesesarea
    *addnid
'''
import pandas as pd
import tesesgrau as tg
import tesesdepartamento as td
import tesesano as tano
import tesespaginas as tp 
import tesesvol as tv
import tesesarea as tarea
import addnid as anid
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

    # tano
    colunaAno = df['ano']
    tano.normAno(colunaAno, n)

    # tp
    colunaPag = df['paginas']
    tp.normPag(colunaPag, n)

    # tv
    colunaVol = df['volumes']
    tv.normVol(colunaVol, n)

    # tarea
    colunaArea = df['area']
    tarea.normArea(colunaArea, n)

    # anid
    anid.addNid(df)

    # exportação
    df.to_csv('testefinal.csv', index=False)

#--------testes---------
    # testes unique
    # df = pd.read_csv('testefinal.csv')
    # print(colunaGrau.unique())
    # print(colunaDepart.unique())
    # print(colunaAno.unique())
    # print(colunaPag.unique())
    # print(colunaVol.unique()) 
    # print(colunaArea.unique())
main()