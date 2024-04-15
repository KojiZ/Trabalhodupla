import tkinter as tk
from tkinter import messagebox
import mysql.connector
import pandas as pd
from tkinter import ttk

# Criando uma conexão global com o banco de dados
conn = mysql.connector.connect(
    host='localhost',
    port='3306',
    database='pythontest',
    user='root',
    password=''
)

def salvar_no_banco(nome, sobrenome, telefone):
    try:
        cursor = conn.cursor()
        query = 'INSERT INTO usuario (nome, sobrenome, telefone) VALUES (%s, %s, %s)'
        cursor.execute(query, (nome, sobrenome, telefone))
        conn.commit()
        messagebox.showinfo("Sucesso", "Dados salvos com sucesso!")
    except mysql.connector.Error as e:
        messagebox.showerror("Erro", f"Ocorreu erro ao salvar no banco: {e}")

def atualizar_tabela():
    cursor = conn.cursor()
    cursor.execute("SELECT  nome, sobrenome, telefone FROM usuario")
    rows = cursor.fetchall()
    tree.delete(*tree.get_children())  # Limpa a tabela antes de atualizá-la
    for row in rows:
        tree.insert("", "end", values=row)

def formatar_telefone(event):
    s = campo_telefone.get()
    s = s.replace("(", "").replace(")", "").replace("-", "").replace(" ", "")
    if len(s) < 11:
        campo_telefone.delete(0, tk.END)
        campo_telefone.insert(tk.END, "(" + s[:2] + ")" + s[2:7] + "-" + s[7:])
    else:
        campo_telefone.delete(0, tk.END)
        campo_telefone.insert(tk.END, "(" + s[:2] + ")" + s[2:7] + "-" + s[7:])

def exibir_mensagem_tkinter():
    nome = campo_nome.get()
    sobrenome = campo_sobrenome.get()
    telefone = campo_telefone.get()
    salvar_no_banco(nome, sobrenome, telefone)
    atualizar_tabela()  # Atualiza a tabela após inserir um novo registro

janela_tkinter = tk.Tk()
janela_tkinter.title("Cadastro Pessoa")
janela_tkinter.geometry("800x250")

# Criação dos widgets
label_nome = tk.Label(janela_tkinter, text="Nome: ")
label_nome.grid(row=1, column=0, padx=5, pady=5)
campo_nome = tk.Entry(janela_tkinter)
campo_nome.grid(row=1, column=1, padx=5, pady=5)

label_sobrenome = tk.Label(janela_tkinter, text="Sobrenome: ")
label_sobrenome.grid(row=2, column=0, padx=5, pady=5)
campo_sobrenome = tk.Entry(janela_tkinter)
campo_sobrenome.grid(row=2, column=1, padx=5, pady=5)

label_telefone = tk.Label(janela_tkinter, text="Telefone: ")
label_telefone.grid(row=3, column=0, padx=5, pady=5)
campo_telefone = tk.Entry(janela_tkinter)
campo_telefone.grid(row=3, column=1, padx=5, pady=5)
campo_telefone.bind("<KeyRelease>", formatar_telefone)

botao_cadastrar = tk.Button(janela_tkinter, text="Cadastrar", command=exibir_mensagem_tkinter)
botao_cadastrar.grid(row=4, column=0, columnspan=2, padx=5, pady=5)

resultado = tk.Label(janela_tkinter, text="")
resultado.grid(row=4, column=1)

tree = ttk.Treeview(janela_tkinter, columns=("Nome:", "Sobrenome:", "Telefone"), show="headings")
tree.heading("Nome:", text="Nome")
tree.heading("Sobrenome:", text="Sobrenome")
tree.heading("Telefone", text="Telefone")
tree.grid(row=0, column=2, rowspan=5, padx=5, pady=5)

atualizar_tabela()  # Atualiza a tabela quando a janela é aberta

janela_tkinter.mainloop()
