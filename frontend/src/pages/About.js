import React from 'react'

import './About.css'

const About = () => (
  <div className="About">
    <h2>Sobre</h2>
    <div className = "FronteiraInfo">
        <h3> FronteiraTec </h3>
        <p>
            FronteiraTec é uma empresa júnior do curso de Ciência da Computação
            da Universidade Federal Da Fronteira Sul. Ela é constituída
            essencialmente por professores e estudantes do curso. Seu objetivo principal
            é encorajar as idéias empreendedoras que surgem entre os alunos e torná-las realidade.
        </p>

        <h3>Calendário UFFS</h3>
        <p>
            O projeto Calendário UFFS objetiva tornar prático o acesso ao
            Cardápio do RU e aos eventos que ocasionalmente ocorrem no meio
            acadêmico da UFFS Campus Chapecó. Ele foi desenvolvido pela célula Web
            da FronteiraTec. O projeto atualmente é de código aberto... 
        </p>
    </div>
    <img width="50px" src="https://avatars3.githubusercontent.com/u/4642782?s=400&v=4"/>
    <i style={{fontSize: 50}} className="fab fa-github"></i>
  </div>
)

export default About
