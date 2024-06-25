using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Hash.MVC.Controller.TabelaHash
{
    public static class FuncaoHash
    {
        public static int valorLetra(char letra)
        {
            int valor = 0;
            switch (letra)
            {
                case 'A':
                    valor = 1;
                        break;
                case 'B':
                    valor = 2;
                    break;
                case 'C':
                    valor = 3;
                    break;
                case 'D':
                    valor = 4;
                    break;
                case 'E':
                    valor = 5;
                    break;
                case 'F':
                    valor = 6;
                    break;
                case 'G':
                    valor = 7;
                    break;
                case 'H':
                    valor = 8;
                    break;
                case 'I':
                    valor = 9;
                    break;
                case 'J':
                    valor = 10;
                    break;
                case 'K':
                    valor = 11;
                    break;
                case 'L':
                    valor = 12;
                    break;
                case 'M':
                    valor = 13;
                    break;
                case 'N':
                    valor = 14;
                    break;
                case 'O':
                    valor = 15;
                    break;
                case 'P':
                    valor = 16;
                    break;
                case 'Q':
                    valor = 17;
                    break;
                case 'R':
                    valor = 18;
                    break;
                case 'S':
                    valor = 19;
                    break;
                case 'T':
                    valor = 20;
                    break;
                case 'U':
                    valor = 21;
                    break;
                case 'V':
                    valor = 22;
                    break;
                case 'W':
                    valor = 23;
                    break;
                case 'X':
                    valor = 24;
                    break;
                case 'Y':
                    valor = 25;
                    break;
                case 'Z':
                    valor = 26;
                    break;                    
            }
            return valor;
        }

        public static int EncontraPosicao(string palavra, int tamanhoHash)
        {
            int soma = 0;
            palavra = palavra.ToUpper();

            foreach (char item in palavra)
            {
                soma += valorLetra(item);
            }

            return soma % tamanhoHash;
        }



    }
}
