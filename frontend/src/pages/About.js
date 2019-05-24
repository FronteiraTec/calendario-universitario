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
            essencialmente por professores e estudantes do curso. Seu objetivo
			principal é encorajar as idéias empreendedoras que surgem entre os
			alunos e torná-las realidade. Atualmente a empresa conta com três
			células de desenvolvimento (Jogos, Web, Mobile) especializadas na
            implementação de soluções baseadas em software.
        </p>

        <h3>Calendário UFFS</h3>
        <p>
			O projeto Calendário UFFS objetiva tornar prático o acesso ao
            Cardápio do RU e aos eventos que ocasionalmente ocorrem no meio
            acadêmico da UFFS Campus Chapecó. Calendário UFFS é uma aplicação de
			código aberto que atualmente encontra-se hospedado na
			plataforma <a href="https://github.com/FronteiraTec/calendario-uffs"
            style={{fontSize: 15, color: "#0366d6"}}>GitHub</a>. A intenção de tornar
            a aplicação <i>Open Source</i> é de grande importância pois dessa maneira
            qualquer desenvolvedor é capaz de contribuir com alguma idéia para o melhoramento
            do projeto, o que reflete diretamente a comunidade acadêmica que dispõe
            desse recurso.
        </p>
    </div>
		<a href="http://fronteiratec.com/" style={{fontSize: 15, color: "#0366d6"}}>FronteiraTec Inc.</a>
		<a href = "https://github.com/FronteiraTec/calendario-uffs" style={{float:"right"}}>
			<i style={{fontSize: 30, color: "black", marginLeft: ".7rem"}} className="fab fa-github"></i>
		</a>
		<a href = "http://fronteiratec.com/" style={{float:"right"}}>
			<img style={{width: 120, height: 30}} src={process.env.PUBLIC_URL + '/logo_completo_fronteira.png'}/>
		</a>
  </div>
)

export default About
