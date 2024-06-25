using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Hash.MVC.Controller.Lista
{
    class Node
    {
        #region 'Atributos'
        private string nomeEstado;
        private string capitalEstado;
        private string regiaoDoEstado;
        private string quantMunicipios;
        private Node next;
        #endregion

        #region 'Propriedades'
        public string NomeEstado { get => nomeEstado; set => nomeEstado = value; }
        public string CapitalEstado { get => capitalEstado; set => capitalEstado = value; }
        public string RegiaoDoEstado { get => regiaoDoEstado; set => regiaoDoEstado = value; }
        public string QuantMunicipios { get => quantMunicipios; set => quantMunicipios = value; }
        public Node Next { get => next; set => next = value; }
        #endregion

        #region 'Construtor'
        public Node(string nomeDoEstado,  string regiaoEstado, string capitalDoEstado, string quantMunicipios, Node proximo)
        {
            this.NomeEstado = nomeDoEstado;
            this.CapitalEstado = capitalDoEstado;
            this.RegiaoDoEstado = regiaoEstado;
            this.QuantMunicipios = quantMunicipios;
            this.Next = proximo;
        }
        #endregion
    }
}
