from time import sleep #Importando pausa no código, biblioteca time.
import serial #importando biblioteca serial do python.
import mysql.connector #importando o mysql conector-biblioteca.
from mysql.connector import errorcode #importando biblioteca de erros do mysqlconector.

# C:\Users\Igor Ramos\AppData\Local\Programs\Python\Python37-32\Scripts> #local onde está instalado no meu PC.

porta ='COM5' #porta que estou utilizando.
ser = serial.Serial(porta, 9600, timeout=1)#velocidade de transmissão que estou utilizando.

def statusVaga(status,id):
    #setado fixo id da vaga como 2.
    cursor = conn.cursor()
    query = ("UPDATE vaga set disponivel='"+status+"'  WHERE id='"+str(id)+"'")  # ? é o id da vaga cadastrada no sistema de gerenciamento.
    cursor.execute(query)
    # salvando minhas alterações.
    conn.commit()
    conn.close()

primeiraVez=1

while True: #Loop Infinito

    try:
        conn = mysql.connector.connect(user='root', password='', host='localhost', database='estacionamento')
        #Isso é apenas provisório: aqui estou definindo o id da vaga que vou ficar fazendo varreduras no bd.
        vaga =2
        #Deixei fixo para não fazer uma busca maior sendo que só tenho apenas um sensor.

        cursor = conn.cursor()
        query = ("SELECT id,disponivel FROM vaga  WHERE id='"+str(vaga)+"'") #2 é o id da vaga cadastrada no sistema de gerenciamento.
        cursor.execute(query)
        result = cursor.fetchone()
        id = result[0]
        disponivel = result[1]
        #conn.close()

        #lendo serial do arduino
        valor = ser.read()
        #tratando serial do arduino.
        valor =str(valor)
        valor = valor.replace("b","")
        valor = valor.replace("'","")

        if primeiraVez==1:
            primeiraVez = 0
            statusVaga(valor, vaga)
        else:

            if valor==disponivel:
                #significa que o valor que esta no bd bate com o valor do arduino, ou seja, não precisa gravar nada.
                print("sem update")
                #conn.close()
            else:
                #significa que são diferentes, ou seja, precisa fazer um update na tabela da vaga pq tem um carro no local.
                print("update  sendo feito neste instante")
                if(disponivel=='s'):
                    statusVaga('n',vaga)
                else:
                    statusVaga('s',vaga)
                print("feito-alteração !s/n")


        sleep(0.5)

    except mysql.connector.Error as err: #caso aconteça algum erro do mysql, conexão etc...
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Nome  ou  senha incorreta")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print("O banco não existe")
        else:
            print("erro aleatório: "+str(err))
    else:
        conn.close() #fechando conexão


