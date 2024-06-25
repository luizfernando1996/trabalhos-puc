using Hash.MVC.Controller.Lista;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Hash.MVC.DAL.LeituraArq
{


    class Leitura
    {
        public Node[] vetorEstados = new Node[27];
        //caminho relativo implementado
        private string pathArquivo3 = "../../MVC/DAL/Arquivos/ArquivoHash.txt";

        //private string[,] registros = new string[27,3];
        private static int indice = 0;
        private bool indiceExcedido = false;
        

       // public string[,] Registros { get => registros; set => registros = value; }

        public Leitura()
        {
            using (StreamReader ler = new StreamReader(pathArquivo3))
            {
                string leitura= "a";
                string[] frase;
                while (leitura != null)
                {
                    leitura = ler.ReadLine();
                    if (leitura != null)
                    {
                        frase = leitura.Split(';');
                        criarObjeto(frase);
                    }
                }
            }

        }
        public void criarObjeto(string[]frase) {
            

            if (indiceExcedido.Equals(false))//inidice = linha do arquivo
            {
                //Registros[indice, 0] = frase[0];//nome
                //Registros[indice, 1] = frase[1];//regiao
                //Registros[indice, 2] = frase[2];//capital
                //Registros[indice, 3] = frase[3];//quant municipios
                Node obj = new Node(frase[0], frase[1], frase[2], frase[3], null);
                vetorEstados[indice] = obj;
            }

            if (indice < 27)
                indice++;
            else
                indiceExcedido = true;
        }


    }

}
